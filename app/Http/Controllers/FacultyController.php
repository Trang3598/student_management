<?php
namespace App\Http\Controllers;
use App\Http\Requests\FacultyRequest;
use App\Http\Requests\FacultyRequestEdit;
use App\Models\Faculty;
use App\Repositories\Faculty\FacultyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class FacultyController extends Controller
{
    protected $facultyRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
        $this->middleware('permission:faculty-list',['only' => 'index']);
        $this->middleware('permission:faculty-create', ['only' => ['create','store']]);
        $this->middleware('permission:faculty-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:faculty-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $request = Request::create('api/faculties', 'GET');
        $faculties = Route::dispatch($request)->original;
        return view('admin.faculties.index', compact('faculties'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculties.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        $request = Request::create('api/faculties', 'POST');
        $response = Route::dispatch($request);
        return redirect(route('faculties.index'))->with('message', 'Add sucssesfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        $classes = $this->facultyRepository->showClasses($id);
//        return view('admin.class.list', compact('classes'));
//    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculties = Faculty::findBySlug($id);
        return view('admin.faculties.edit', compact('faculties'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacultyRequestEdit $request, $id)
    {
        $request = Request::create('api/faculties/' . $id, 'PUT');
        $response = Route::dispatch($request);
        return redirect(route('faculties.index'))->with('message', 'Edit successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::create('api/faculties/' . $id, 'DELETE');
        $response = Route::dispatch($request);
        return redirect(route('faculties.index'))->with('message', 'Delete successfully');
    }
}
