<?php

namespace App\Http\Resources\School;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Student\StudentResource;

class SchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $method = $request->method();

        $message = "School {$this->name} {$method} successfully.";

        return [
            'id' => $this->id,
            'name' => $this->name,
            'students' => StudentResource::collection($this->whenLoaded('students')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $request->show_deleted ? $this->deleted_at : null,
            'message' => $message,
        ];
    }
}
