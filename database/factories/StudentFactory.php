<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{

    protected $model = Student::class;
    private static $order = [];

    public function definition(): array
    {
        $schoolId = School::pluck('id')->random();

        if (!isset(self::$order[$schoolId])) {
            self::$order[$schoolId] = 1;
        } else {
            self::$order[$schoolId]++;
        }

        return [
            'name' => $this->faker->name,
            'school_id' => $schoolId,
            'order' => self::$order[$schoolId],
        ];
    }
}
