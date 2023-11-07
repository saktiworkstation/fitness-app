<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\WorkoutHistory;
use App\Models\UserSubscription;

class DWorkoutHistoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();

        // Membuat dan mengotentikasi pengguna
        // Cek apakah pengguna sudah ada sebelum membuatnya
        if (!User::where('email', 'sakti@gmail.com')->exists()) {
            // Jika belum ada, maka buat dan autentikasi pengguna
            User::create([
                'name' => 'Sakti',
                'username' => 'sakti',
                'email' => 'sakti@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]);
        }

        $user = User::where('email', 'sakti@gmail.com')->first();
        $this->actingAs($user);
    }

    public function testIndexMethod()
    {
        // Membuat beberapa data WorkoutHistory untuk diuji
        WorkoutHistory::factory()->count(5)->create();

        // Membuat request ke route 'dashboard.absentions.index'
        $response = $this->get('dashboard.absentions.index');

        // Memastikan bahwa halaman berhasil di-load dan status code 200
        $response->assertStatus(200);

        // Memeriksa apakah view 'dashboard.absention.index' digunakan
        $response->assertViewIs('dashboard.absentions.index');

        // Memeriksa apakah data workoutHistories dikirim ke view
        $response->assertViewHas('workoutHistories');
    }

    public function testCreateMethod()
    {
        // Membuat request ke URL 'dashboard/absentions/create'
        $response = $this->get('dashboard.absentions.create');

        // Memastikan bahwa halaman berhasil di-load dan status code 200
        $response->assertStatus(200);

        // Memeriksa apakah view 'dashboard.absention.create' digunakan
        $response->assertViewIs('dashboard.absentions.create');

        // Memeriksa apakah data subscriptions dikirim ke view
        $response->assertViewHas('subscriptions');
    }
}
