<?php

namespace App\Http\Resources\Student;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $method = $request->method();

        $message = "Student {$this->name} {$method} successfully.";

        return [
            'order' => $this->order,
            'id' => $this->id,
            'name' => $this->name,
            'school' => $this->whenLoaded('school'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $request->show_deleted ? $this->deleted_at : null,
            'message' => $message,
        ];
    }
}
