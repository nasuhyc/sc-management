<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\School;
use App\Models\Student;
use Tymon\JWTAuth\Facades\JWTAuth;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_store(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $school = School::factory()->create();
        $order = Student::where('school_id', $school->id)->max('order') + 1;

        $response = $this->json('POST', '/api/student', [
            'name' => 'Student 1',
            'school_id' => $school->id,
            'order' => $order,
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(201);
    }

    public function test_student_index(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->json('GET', '/api/student', [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function test_student_show(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $student = Student::factory()->create();

        $response = $this->json('GET', '/api/student/'.$student->id, [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function test_student_update(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $student = Student::factory()->create();

        $response = $this->json('PUT', '/api/student/'.$student->id, [
            'name' => 'Student 2',
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function test_student_destroy(): void {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $student = Student::factory()->create();
        $student->refresh();

        $response = $this->json('DELETE', '/api/student/'.$student->id, [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }
}
