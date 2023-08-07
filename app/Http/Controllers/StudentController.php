<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Student\StudentService;
use App\Http\Resources\Student\StudentResource;
use App\Http\Resources\Student\StudentCollection;
use App\Models\Student;
use App\Events\StudentDeleted;




class StudentController extends Controller
{
    public function __construct(
        protected StudentService $studentService
    )
    {}

    public function store(Request $request)
    {
        $order = Student::where('school_id', $request['school_id'])->max('order');
        $order = $order + 1;
        $request['order'] = $order;
        $student = $this->studentService->store($request);
        return new StudentResource($student);
    }

    public function index()
    {
        $students = $this->studentService->index();
        return new StudentCollection($students);
    }

    public function show($id)
    {
        $student = $this->studentService->show($id);
        return new StudentResource($student);
    }

    public function update(Request $request, $id)
    {
        $student = $this->studentService->update($request, $id);
        return new StudentResource($student);
    }

    public function destroy($id)
    {
        $student = $this->studentService->destroy($id);
        event(new \App\Events\StudentDeleted($id));
        return new StudentResource($student);
    }

}
