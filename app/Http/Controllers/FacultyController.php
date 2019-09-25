<?php
namespace App\Http\Controllers;
    use App\Http\Requests\FacultyRequest;
    use App\Http\Requests\FacultyRequestEdit;
    use App\Models\Faculty;
    use Illuminate\Http\Requests;
    use App\Repositories\Faculty\FacultyRepository;
    use Illuminate\Support\Facades\Session;

    class FacultyController extends Controller
{
    /**
    * @var FacultyRepositoryInterface|\App\Repositories\Repository
    */
    protected $facultyRepository;
    public function __construct(FacultyRepository $facultyRepository)
    {
    $this->facultyRepository = $facultyRepository;
    $this->middleware('permission:faculty-list',['only' => 'index']);
    $this->middleware('permission:faculty-create', ['only' => ['create','store']]);
    $this->middleware('permission:faculty-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:faculty-delete', ['only' => ['destroy']]);
    }
    /**
    * Show all post
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $faculties = $this->facultyRepository->getList();
    return view('admin.faculties.index', compact('faculties'));
    }
    /**
    * Create single post
    *
    */
    public function create()
    {
    return view('admin.faculties.create');
    }
    /**
    * Show single post
    *
    * @param $id int Post ID
    * @return \Illuminate\Http\Response
    */
    /*    public function show($id)
    {
    $faculties = $this->facultyRepository->find($id);
    return view('admin.faculties.show', compact('faculties'));
    }*/
    /**
    * Create single post
    *
    * @param $request \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */
    public function store(FacultyRequest $request)
    {
    $data = $request->all();
    $this->facultyRepository->store($data);
    return redirect(route('faculties.index'))->with('success',__('messages.success'));
    }

    public function edit($id)
    {
    $faculties = Faculty::findBySlug($id);
    return view('admin.faculties.edit', compact('faculties'));
    }
    /**
    * Update single post
    *
    * @param $request \Illuminate\Http\Request
    * @param $id int Post ID
    * @return \Illuminate\Http\Response
    */
    public function update($id, FacultyRequestEdit $request)
    {
    $data = $request->all();
    $name_edit = $request->all()['name'];
    $faculties = $this->facultyRepository->getListById($id);
    $name_update = $faculties->name;
    if ($name_edit == $name_update) {
    $this->facultyRepository->update($id, $request->all());
    return redirect(route('faculties.index'))->with(['success' => 'Nothing Update']);
    } else {
    $this->facultyRepository->update($id, $data);
    return redirect(route('faculties.index'))->with(['success' => 'Update']);
    }
    }
    /**
    * Delete single post
    *
    * @param $id int Post ID
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
    $this->facultyRepository->destroy($id);
    return redirect(route('faculties.index'))->with('success', 'Delete-success!');
    }
}
