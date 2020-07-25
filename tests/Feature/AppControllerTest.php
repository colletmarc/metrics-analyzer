<?php

namespace Tests\Feature;

use App\Models\App;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_cant_list_apps()
    {
        factory(App::class, 2)->create();

        $response = $this->get('/apps');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function user_can_list_apps()
    {
        $user = factory(User::class)->create();
        $apps = factory(App::class, 2)->create();

        $response = $this->actingAs($user)->get('/apps');

        $response->assertStatus(200);
        $response->assertSeeText($apps->first()->name);
        $response->assertSeeText($apps->last()->name);
    }

    /** @test */
    public function user_can_create_apps()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/apps/create');

        $response->assertStatus(200);
        $response->assertSeeText('Create');

        $params = [
            'name' => 'Toto',
            'host' => 'https://www.toto.com',
            'metrics_endpoint' => 'https://www.metrics.net',
        ];

        $response = $this->actingAs($user)->post('/apps', $params);
        $response->assertStatus(302);

        $this->assertDatabaseHas('apps', [
            'name' => 'Toto',
            'host' => 'https://www.toto.com',
            'metrics_endpoint' => 'https://www.metrics.net',
        ]);
    }

    /** @test */
    public function user_cant_create_apps_because_of_error_validation()
    {
        $user = factory(User::class)->create();

        $params = [
            'name' => 'Toto',
            'host' => 'not_an_url',
            'metrics_endpoint' => 'not_an_url',
        ];

        $response = $this->actingAs($user)->post('/apps', $params);
        $response->assertStatus(302);

        $this->assertDatabaseMissing('apps', [
            'name' => 'Toto',
            'host' => 'not_an_url',
            'metrics_endpoint' => 'not_an_url',
        ]);
    }

    /** @test */
    public function user_can_update_apps()
    {
        $user = factory(User::class)->create();
        $app = factory(App::class)->create();

        $response = $this->actingAs($user)->get('/apps/' . $app->id . '/edit');

        $response->assertStatus(200);
        $response->assertSeeText($app->name);

        $params = [
            'name' => $app->name,
            'host' => 'https://www.toto.com',
            'metrics_endpoint' => 'https://www.metrics.net',
        ];

        $response = $this->actingAs($user)->patch('/apps/' . $app->id, $params);
        $response->assertStatus(302);

        $this->assertDatabaseHas('apps', [
            'name' => $app->name,
            'host' => 'https://www.toto.com',
            'metrics_endpoint' => 'https://www.metrics.net',
        ]);
    }

    /** @test */
    public function user_cant_update_apps_because_of_error_validation()
    {
        $user = factory(User::class)->create();
        $app = factory(App::class)->create();

        $params = [
            'name' => $app->name,
            'host' => 'not_an_url',
            'metrics_endpoint' => 'not_an_url',
        ];

        $response = $this->actingAs($user)->patch('/apps/' . $app->id, $params);
        $response->assertStatus(302);

        $this->assertDatabaseMissing('apps', [
            'name' => $app->name,
            'host' => 'not_an_url',
            'metrics_endpoint' => 'not_an_url',
        ]);
    }

    /** @test */
    public function user_can_delete_apps()
    {
        $user = factory(User::class)->create();
        $app = factory(App::class)->create();

        $response = $this->actingAs($user)->delete('/apps/' . $app->id);

        $response->assertRedirect('/apps');

        $this->assertDatabaseMissing('apps', [
            'name' => $app->name,
            'host' => $app->host,
            'metrics_endpoint' => $app->metrics_endpoint,
        ]);
    }
}
