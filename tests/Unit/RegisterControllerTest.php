<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_register_view_loads()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertViewIs('register.index');
    }

    public function test_valid_user_can_register()
    {
        $userData = [
            'name' => 'Saktiini',
            'username' => 'saktikusuma',
            'email' => 'sakti@gmail.com',
            'password' => 'password'
        ];

        $response = $this->post('/register', $userData);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);
    }

    public function test_invalid_user_cannot_register()
    {
        // Coba mendaftarkan pengguna dengan email yang sudah ada di database
        // $existingUser = [
        //     'name' => 'Sakti',
        //     'username' => 'sakti',
        //     'email' => 'sakti@gmail.com',
        //     'password' => 'password'
        // ];

        // $response = $this->post('/register', $existingUser);

        // // Memastikan sesi memiliki kunci 'errors' setelah mencoba mendaftarkan pengguna dengan email yang sudah ada.
        // $response->assertSessionHasErrors('errors');

        // Coba mendaftarkan pengguna tanpa email
        $userWithoutEmail = [
            'name' => 'User Without Email',
            'username' => 'userwithoutemail',
            'password' => 'password123',
        ];

        $response = $this->post('/register', $userWithoutEmail);

        // Memastikan sesi memiliki kunci 'errors' setelah mencoba mendaftarkan pengguna tanpa email.
        $response->assertSessionHasErrors('email');
    }


}
