<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
     /**
     */
    use RefreshDatabase;

    //User Login Test
    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'nasuhyc@gmail.com',
            'password' => bcrypt('123123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'nasuhyc@gmail.com',
            'password' => '123123',
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure(['access_token']);
    }

    //User Login Test with invalid credentials
    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'nasuhyc@gmail.com',
            'password' => bcrypt('123123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
    }


    //User Register Test
    public function test_user_can_register()
    {
        $userData = [
            'name' => 'Nasuh Yücel',
            'email' => 'nasuhyc@gmail.com',
            'password' => '123123',
            'password_confirmation' => '123123',
        ];
        $response = $this->postJson('/api/register', $userData);
        $response->assertStatus(200);
        $response->assertJsonStructure(['access_token']);
    }

    //User Register Test with invalid data
    public function test_user_cannot_register_with_invalid_data()
    {
        $userData = [
            'name' => 'Nasuh Yücel',
            'email' => 'invalidemail',
            'password' => '123123',
            'password_confirmation' => 'wrongpassword',
        ];
        $response = $this->postJson('/api/register', $userData);
        $response->assertStatus(400);
    }

}
