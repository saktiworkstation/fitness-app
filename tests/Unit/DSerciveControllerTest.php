<?php

namespace Tests\Unit;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DSerciveControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();

        // Membuat dan mengotentikasi pengguna
        $user =  User::create([
            'name' => 'Sakti',
            'username' => 'sakti',
            'email' => 'sakti@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
        $this->actingAs($user);
    }

    public function test_create_service()
    {
        $response = $this->get(route('services.create'));

        $response->assertStatus(200);
    }

    public function test_store_service()
    {
        $data = [
            'name' => 'Test Service',
            'slug' => 'test-service',
            'price' => 100,
        ];

        $response = $this->post(route('services.store'), $data);

        $response->assertRedirect(route('services.index'));

        $this->assertDatabaseHas('services', $data);
    }

    public function test_edit_service()
    {
        $service = Service::factory()->create();

        $response = $this->get(route('services.edit', $service));

        $response->assertStatus(200);
    }

    public function test_update_service()
    {
        $service = Service::factory()->create();

        $newData = [
            'name' => 'Updated Service',
            'price' => 200,
        ];

        $response = $this->put(route('services.update', ['service' => $service]), $newData);

        $response->assertRedirect(app('url')->to(route('services.index')));

        $this->assertDatabaseHas('services', $newData);
    }

    public function test_destroy_service()
    {
        $service = Service::factory()->create();

        $response = $this->delete(route('services.destroy', $service));

        $response->assertRedirect(route('services.index'));

        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }
}
