<?php

namespace App\Http\Resources\School;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SchoolCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $method = $request->method();

        $message =  "School {$method} successfully.";

        return [
            'data' => $this->collection->transform(function ($school) {
                return [
                    'id' => $school->id,
                    'name' => $school->name,
                    'students' => $school->students,
                    'created_at' => $school->created_at,
                    'updated_at' => $school->updated_at,
                    'deleted_at' => $school->deleted_at,
                ];
            }),
            'message' => $message,
        ];
    }
}
