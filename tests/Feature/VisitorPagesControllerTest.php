<?php

namespace Tests\Feature;

use App\Mission;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisitorPagesControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_index()
    {
        $missions = factory(Mission::class, 2)->create([
            "description" => "<div>ble<p>la la</p></div>",
            "date" => Carbon::now()->addYear(),
            "status" => "published"
        ]);

        $response = $this->get("/");

        $response->assertOk();
        $response->assertViewIs("visitors.index");
        $viewDataMissions = $response->viewData("missions");
        $this->assertCount(2, $viewDataMissions);
        $this->assertEquals("la la", $viewDataMissions[0]["description_preview"]);
    }

    public function test_index_onlyReceivesPublishedMissions()
    {
        $publishedMission = factory(Mission::class)->create([
            'date' => Carbon::now()->addYear(),
            'status' => 'published'
        ]);
        $draftMission = factory(Mission::class)->create([
            'date' => Carbon::now()->addYear(),
            'status' => 'draft'
        ]);

        $response = $this->get("/");

        $response->assertOk();
        $viewDataMissions = $response->viewData("missions");
        $this->assertCount(1, $viewDataMissions);
        $this->assertEquals($publishedMission->id, $viewDataMissions[0]["id"]);
    }

    public function test_index_onlyReceivesFutureMissions()
    {
        $mission1 = factory(Mission::class)->create([
            "date" => Carbon::now()->addYear(),
            "status" => "published"
        ]);
        factory(Mission::class)->create([
            "date" => Carbon::now()->subYear(),
            "status" => "published"
        ]);

        $response = $this->get("/");

        $response->assertOk();
        $viewDataMissions = $response->viewData("missions");
        $this->assertCount(1, $viewDataMissions);
        $this->assertEquals($mission1->id, $viewDataMissions[0]["id"]);
    }

    public function test_index_onlyReceives10Missions()
    {
        factory(Mission::class, 11)->create([
            'date' => Carbon::now()->addYear(),
            'status' => 'published'
        ]);

        $response = $this->get("/");

        $response->assertOk();
        $this->assertCount(10, $response->viewData("missions"));
    }

    public function test_index_receivesMissionsInAscendingOrderByDate()
    {
        $furtherMission = factory(Mission::class)->create([
            'date' => Carbon::now()->addYears(2),
            'status' => 'published'
        ]);
        $nearingMission = factory(Mission::class)->create([
            'date' => Carbon::now()->addYear(),
            'status' => 'published'
        ]);

        $response = $this->get("/");

        $viewDataMissions = $response->viewData("missions");
        $this->assertEquals($nearingMission->id, $viewDataMissions[0]->id);
        $this->assertEquals($furtherMission->id, $viewDataMissions[1]->id);
    }

    public function test_single_mission_whenUserIsGuest()
    {
        $mission = factory(Mission::class)->create();

        $response = $this->get("/mission/$mission->id");

        $response->assertRedirect("/#login");
    }

    public function test_single_mission_whenUserIsMember()
    {
        $mission = factory(Mission::class)->create();
        $user = factory(User::class)->create([
            "type" => "member"
        ]);

        $response = $this->actingAs($user)->get("/mission/$mission->id");

        $response->assertOk();
    }

    public function test_single_mission_whenUserIsAdmin()
    {
        $mission = factory(Mission::class)->create();
        $user = factory(User::class)->create([
            "type" => "admin"
        ]);

        $response = $this->actingAs($user)->get("/mission/$mission->id");

        $response->assertOk();
    }

    public function test_single_mission_whenUserIsSuperAdmin()
    {
        $mission = factory(Mission::class)->create();
        $user = factory(User::class)->create([
            "type" => "superadmin"
        ]);

        $response = $this->actingAs($user)->get("/mission/$mission->id");

        $response->assertOk();
    }

    public function test_single_mission_whenUserHasUnknownRole()
    {
        $mission = factory(Mission::class)->create();
        $user = factory(User::class)->create([
            "type" => "unknown-role"
        ]);

        $response = $this->actingAs($user)->get("/mission/$mission->id");

        $response->assertRedirect("/#login");
    }

    public function test_single_mission_onNonExistentMission()
    {
        $user = factory(User::class)->create([
            "type" => "member"
        ]);

        $response = $this->actingAs($user)->get("/mission/1");

        $response->assertNotFound();
    }

    public function test_single_mission_containsMissionData()
    {
        $mission = factory(Mission::class)->create();
        $user = factory(User::class)->create([
            "type" => "member"
        ]);

        $response = $this->actingAs($user)->get("/mission/$mission->id");

        $response->assertOk();
        $response->assertViewIs("visitors.single-mission");
        $response->assertViewHas("mission", $mission);
    }

    public function test_single_mission_containsAtMost3NewestMissionsDataOrderedFromNewestToOldest()
    {
        // WHEN
        $missions = factory(Mission::class, 10)->create();
        $sortedMissions = $missions->sortByDesc(fn($m) => $m->date);
        $oldestMission = $sortedMissions->last();
        $user = factory(User::class)->create([
            "type" => "member"
        ]);

        // GIVEN
        $response = $this->actingAs($user)->get("/mission/" . $oldestMission->id);

        // THEN
        $response->assertOk();

        $expectedNewestMissions = $sortedMissions->take(3)->values();
        $actualNewestMissions = $response->viewData("newest_missions");

        $this->assertCount(3, $actualNewestMissions);
        for ($i = 0; $i < 3; $i++) {
            $this->assertEquals(
                $expectedNewestMissions[$i]->id,
                $actualNewestMissions[$i]->id
            );
        }
    }

    public function test_single_missions_NewestMissionsDataDoesNotIncludeCurrentMission()
    {
        $missions = factory(Mission::class, 3)->create();
        $user = factory(User::class)->create([
            "type" => "member"
        ]);

        $response = $this->actingAs($user)->get("/mission/" . $missions[0]->id);

        $response->assertOk();
        $this->assertFalse($response->viewData("newest_missions")->contains($missions[0]));
    }

    public function test_single_mission_approachingMissionsDataIsOfFutureMissionsInAscOrder()
    {
        // WHEN
        $missions = factory(Mission::class, 10)->create();
        $sortedMissions = $missions->sortBy(fn($m) => $m->date);
        $latestMission = $sortedMissions->last();
        $user = factory(User::class)->create([
            "type" => "member"
        ]);

        // GIVEN
        $response = $this->actingAs($user)->get("/mission/" . $latestMission->id);

        // THEN
        $response->assertOk();
        $response->assertViewHas("approaching_missions");

        $expectedApproachingMissions = $sortedMissions
            ->filter(fn($m) => $m->date->isFuture())
            ->values();
        $actualApproachingMissions = $response->viewData("approaching_missions");

        foreach ($actualApproachingMissions as $idx => $actualApproachingMission) {
            $this->assertEquals(
                $expectedApproachingMissions[$idx]->id,
                $actualApproachingMission->id
            );
        }
    }

    public function test_single_blog_approachingMissionDataHasAtMost3Missions()
    {
        $missions = factory(Mission::class, 5)->create([
            "date" => Carbon::now()->addDay()
        ]);
        $user = factory(User::class)->create([
            "type" => "member"
        ]);

        $response = $this->actingAs($user)->get("/mission/" . $missions[0]->id);

        $response->assertOk();
        $approachingMissions = $response->viewData("approaching_missions");
        $this->assertCount(3, $approachingMissions);
    }

    function test_single_mission_approachingMissionsDataDoesNotIncludeCurrentMission()
    {
        $currentMission = factory(Mission::class)->create([
            "date" => Carbon::now()->addDay()
        ]);
        $otherMissions = factory(Mission::class, 5)->create([
            "date" => Carbon::now()->addDays(2)
        ]);
        $user = factory(User::class)->create([
            "type" => "member"
        ]);

        $response = $this->actingAs($user)->get("/mission/" . $currentMission->id);

        $actualApproachingMissions = $response->viewData("approaching_missions");
        $this->assertFalse($actualApproachingMissions->contains($currentMission));
    }

    public function test_team()
    {
        $response = $this->get("/team");
        $response->assertViewIs("visitors.team");
    }

    public function test_contact()
    {
        $response = $this->get("/contact");
        $response->assertViewIs("visitors.contact");
    }

    public function test_partners()
    {
        $response = $this->get("/partners");
        $response->assertViewIs("visitors.partners");
    }

    public function test_upcoming_events()
    {
        // GIVEN
        $pastMissions = factory(Mission::class, 3)->create([
            "date" => Carbon::now()->subDay(),
            "status" => "published"
        ]);
        $upcomingMissions = factory(Mission::class, 2)->create([
            "date" => Carbon::now()->addDay(),
            "status" => "published"
        ]);

        // WHEN
        $response = $this->get("/upcoming-events");

        // THEN
        $response->assertViewIs("visitors.upcoming-events");

        $viewData = $response->viewData("missions");
        $this->assertCount($upcomingMissions->count(), $viewData);
    }

    public function test_past_events()
    {
        // GIVEN
        $pastMissions = factory(Mission::class, 3)->create([
            "date" => Carbon::now()->subDay(),
            "status" => "published"
        ]);
        $upcomingMissions = factory(Mission::class, 2)->create([
            "date" => Carbon::now()->addDay(),
            "status" => "published"
        ]);

        // WHEN
        $response = $this->get("/past-events");

        // THEN
        $response->assertViewIs('visitors.past-events');

        $viewData = $response->viewData("missions");
        $this->assertCount($pastMissions->count(), $viewData);
    }
}
