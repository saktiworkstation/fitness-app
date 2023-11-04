<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    public function test_login_view_loads()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login.index');
    }

    public function test_valid_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'testuser@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'testuser@gmail.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_user_cannot_login()
    {
        $response = $this->post('/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'invalidpassword',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('loginError');
        $this->assertGuest();
    }

    public function test_authenticated_user_can_logout()
    {
        $user = User::factory()->create();

        Auth::login($user);

        $response = $this->post('/logout');

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
