<?php
namespace App\Http\Controllers\API;
use App\Models\ClassModel;
use App\Models\Faculty;
use App\Http\Requests\FacultyRequest;
use App\Http\Resources\Faculty as FacultyResource;
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
        $faculities = Faculty::paginate(5);
        return FacultyResource::collection($faculities);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculties = Faculty::create($request->all());
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
        $faculty = Faculty::findOrFail($id);
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
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
    }
}
