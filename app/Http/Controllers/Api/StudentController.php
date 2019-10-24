<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Student as StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Student[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $students = Student::all();

        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Student|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        $student = Student::create($request->all());

        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return Student
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return bool
     */
    public function update(Request $request, Student $student)
    {
        return $student->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @throws \Exception
     */
    public function destroy(Student $student)
    {
        $student->delete();
    }
}
