<?php

namespace App\Services\School;

use App\Models\School;
use Illuminate\Http\Request;


class SchoolService {

    public function store($request)
    {
        $school = School::create($request->all());
        return $school;
    }

    public function index()
    {
        $schools = School::with(['students' => function ($query) {
            $query->orderBy('order', 'asc');
        }])->get();
        return $schools;
    }

    public function show($id)
    {
        $school = School::with('students')->findOrFail($id);
        return $school;
    }

    public function update($request, $id)
    {
        $school = School::with('students')->findOrFail($id);
        $school->update($request->all());
        return $school;
    }

    public function destroy($id)
    {
        $school = School::with('students')->findOrFail($id);
        $school->students()->delete();
        $school->delete();
        return $school;
    }

}



?>
