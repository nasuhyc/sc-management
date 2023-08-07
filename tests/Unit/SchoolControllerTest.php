<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\School;
use Tymon\JWTAuth\Facades\JWTAuth;


class SchoolControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    use RefreshDatabase;
    /**
     *
     */
    public function test_school_store(): void{
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->json('POST', '/api/school', [
            'name' => 'School 1',
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(201);
    }

    public function test_school_index(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->json('GET', '/api/school', [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function test_school_show(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $school = School::factory()->create();

        $response = $this->json('GET', '/api/school/'.$school->id, [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function test_school_update(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $school = School::factory()->create();

        $response = $this->json('PUT', '/api/school/'.$school->id, [
            'name' => 'School 2',
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function test_school_destroy(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $school = School::factory()->create();

        $response = $this->json('DELETE', '/api/school/'.$school->id, [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }
}
