<?php

namespace App\Http\Controllers\API;

use App\ClassModel;
use App\FacultyModel;
use App\Http\Requests\FacultyRequest;
use App\Http\Resources\Faculty as FacultyResource;
use App\Http\Resources\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faculities = FacultyModel::all();
        return Faculty::collection($faculities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $faculties = FacultyModel::create($request->all());
        return new FacultyResource($faculties);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $classes = ClassModel::where('faculty_id', $id)->get();
        return $classes;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacultyRequest $request, $id)
    {
        //
        $faculty = FacultyModel::findOrFail($id);
        $faculty->update($request->all());
        return $faculty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $faculty = FacultyModel::findOrFail($id);
        $faculty->delete();
    }
}
