<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\School\SchoolService;
use App\Http\Resources\School\SchoolResource;
use App\Http\Resources\School\SchoolCollection;
use App\Events\StudentDeleted;



class SchoolController extends Controller
{
    public function __construct(
        protected SchoolService $schoolService
    )
    {}

    public function store(Request $request)
    {
        $school = $this->schoolService->store($request);
        return new SchoolResource($school);
    }

    public function index()
    {
        $schools = $this->schoolService->index();
        return new SchoolCollection($schools);
    }

    public function show($id)
    {
        $school = $this->schoolService->show($id);
        return new SchoolResource($school,200);
    }

    public function update(Request $request, $id)
    {
        $school = $this->schoolService->update($request, $id);
        return new SchoolResource($school);
    }

    public function destroy($id)
    {
        $school = $this->schoolService->destroy($id);
        return new SchoolResource($school);

    }

}
