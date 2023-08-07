<?php

namespace App\Http\Resources\Student;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $method = $request->method();

        $message =  "Student {$method} successfully.";

        // Group students by school
        $groupedStudents = $this->collection->groupBy('school_id')->map(function ($students) {
            return $students->transform(function ($student) {
                return [
                    'order' => $student->order,
                    'id' => $student->id,
                    'name' => $student->name,
                    'school' => $student->school,
                    'created_at' => $student->created_at,
                    'updated_at' => $student->updated_at,
                    'deleted_at' => $student->deleted_at,
                ];
            });
        });

        return [
            'data' => $groupedStudents,
            'message' => $message,
        ];
    }
}
