<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Student;

class SchoolSeeder extends Seeder
{
    public function run()
    {
            School::factory()->count(10)->create();
    }
}
