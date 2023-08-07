<?php
namespace App\Services\Student;

use App\Models\Student;
use Illuminate\Http\Request;



class StudentService
{

    public function store($request)
    {
        $student = Student::create($request->all());
        return $student;
    }

    public function index()
    {
        $students = Student::with('school')->orderBy('school_id','asc')->orderBy('order','asc')->get();
        return $students;
    }

    public function show($id)
    {
        $student = Student::with('school')->findOrFail($id);
        return $student;
    }

    public function update($request, $id)
    {
        $student = Student::with('school')->findOrFail($id);
        $student->update($request->all());
        return $student;
    }

    public function destroy($id)
    {
        $student = Student::with('school')->findOrFail($id);
        $student->delete();
        return $student;
    }



}




?>
