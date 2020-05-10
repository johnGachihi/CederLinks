<?php

namespace Tests\Feature;

use App\Mission;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MissionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_when_userIsUnauthorized()
    {
        $response = $this->json('POST', '/admin/mission');
        $response->assertUnauthorized();
    }

    public function test_create()
    {
        $admin = factory(User::class)->create([
            'type' => 'admin'
        ]);
        $response = $this->actingAs($admin)->json('POST', '/admin/mission');

        $response->assertCreated();
        $this->assertTrue(Mission::count() === 1);
    }

    public function test_read_when_userIsUnauthorized()
    {
        $response = $this->json('GET', '/admin/mission/1');
        $response->assertUnauthorized();
    }

    public function test_read_whenMissionIDProvided()
    {
        $admin = factory(User::class)->create([
            'type' => 'admin'
        ]);
        $mission = factory(Mission::class)->create();

        $response = $this->actingAs($admin)
            ->json('GET', '/admin/mission/' . $mission->id);

        $response->assertOk();
        $response->assertJson([
            'id' => $mission->id,
            'title' => $mission->title,
            'description' => $mission->description
        ]);
    }

    public function test_read_whenNoMissionIDProvided()
    {
        $admin = factory(User::class)->create([
            'type' => 'admin'
        ]);
        $missions = factory(Mission::class, 2)->create();

        $response = $this->actingAs($admin)
            ->json('GET', '/admin/mission');

        $response->assertOk();
        $response->assertJsonCount(2);
        $response->assertJson([
            [
                "id" => $missions[0]->id,
                "title" => $missions[0]->title,
                "description" => $missions[0]->description
            ],
            [
                "id" => $missions[1]->id,
                "title" => $missions[1]->title,
                "description" => $missions[1]->description
            ]
        ]);
    }

    public function test_update_whenUserUnauthorized()
    {
        $response = $this->json('POST', '/admin/mission/1');
        $response->assertUnauthorized();
    }

    public function test_update_onNonExistentMission()
    {
        $admin = factory(User::class)->create([
            'type' => 'admin'
        ]);

        $response = $this->actingAs($admin)
            ->json('POST', '/admin/mission/1');

        $response->assertNotFound();
    }

    public function test_update()
    {
        $admin = factory(User::class)->create([
            "type" => "admin"
        ]);
        $mission = factory(Mission::class)->create();
        $updatedMission = factory(Mission::class)->make();

        $response = $this->actingAs($admin)
            ->json('POST', '/admin/mission/' . $mission->id, [
                'title' => $updatedMission->title,
                'date' => $updatedMission->date,
                'description' => $updatedMission->description
            ]);

        $response->assertOk();
        $this->assertDatabaseHas('missions', [
            'title' => $updatedMission->title,
            'date' => $updatedMission->date,
            'description' => $updatedMission->description
        ]);
    }

    public function test_update_missionImageWhenItWasNull()
    {
        Storage::fake('image-uploads');
        $admin = factory(User::class)->create([
            "type" => "admin"
        ]);
        $mission = factory(Mission::class)->create();

        $response = $this->actingAs($admin)
            ->json('POST', "/admin/mission/$mission->id", [
                'image' => UploadedFile::fake()->image('photo1.jpg')
            ]);

        $response->assertOk();
        $this->assertDatabaseHas('missions', [
            'image' => "missions/$mission->id.jpg"
        ]);
        Storage::disk('image-uploads')->assertExists("missions/$mission->id.jpg");
    }

    public function test_update_whenItExisted()
    {
        Storage::fake('image-uploads');
        $admin = factory(User::class)->create([
            "type" => "admin"
        ]);
        $mission = factory(Mission::class)->create();

        $response = $this->actingAs($admin)
            ->json('POST', "/admin/mission/$mission->id", [
                'image' => UploadedFile::fake()->image('photo1.jpg')
            ]);

        $response->assertOk();

        $response = $this->actingAs($admin)
            ->json('POST', "/admin/mission/$mission->id", [
                'image' => UploadedFile::fake()->image('photo2.png')
            ]);

        $response->assertOk();
        Storage::disk('image-uploads')->assertMissing("missions/$mission->id.jpg");
        Storage::disk('image-uploads')->assertExists("missions/$mission->id.png");
    }

    public function test_delete_whenUnauthorized()
    {
        $response = $this->json('DELETE', '/admin/mission/1');
        $response->assertUnauthorized();
    }

    public function test_delete_withNonExistentMission()
    {
        $admin = factory(User::class)->create([
            'type' => 'admin'
        ]);
        $response = $this->actingAs($admin)
            ->json('DELETE', '/admin/mission/1');

        $response->assertNotFound();
    }

    public function test_delete()
    {
        $admin = factory(User::class)->create([
            'type' => 'admin'
        ]);
        $mission = factory(Mission::class)->create();

        $response = $this->actingAs($admin)
            ->json('DELETE', "/admin/mission/$mission->id");

        $response->assertOk();
        $this->assertDatabaseMissing('missions', [
            'id' => $mission->id
        ]);
    }
}
