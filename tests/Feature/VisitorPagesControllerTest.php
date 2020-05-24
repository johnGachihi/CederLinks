<?php

namespace Tests\Feature;

use App\Mission;
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
}
