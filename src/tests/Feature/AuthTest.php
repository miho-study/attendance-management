<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'テスト太郎',
            'email' => 'taro@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertAuthenticated();
    }

    public function test_user_can_login_and_logout(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $loginResponse = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $loginResponse->assertRedirect(RouteServiceProvider::HOME);
        $this->assertAuthenticatedAs($user);

        $logoutResponse = $this->post('/logout');

        $logoutResponse->assertRedirect('/');
        $this->assertGuest();
    }
}
