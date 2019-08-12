<?php

namespace App\Http\Controllers;

use App\Repositories\SubjectEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;
use App\SubjectModel;

class SubjectController extends Controller
{
    protected $subjectRepository;
    public function __construct(SubjectEloquentRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = $this->subjectRepository->getAll();
        return view('admin.subject.list',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request,SubjectModel $subject)
    {
        //
        $subjects = $this->subjectRepository->create($request->all());
        return redirect(route('subject.index'))->with('message',"Add successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subject = $this->subjectRepository->find($id);
        return view('admin.subject.edit',['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        //
        $this->subjectRepository->update($id,  $request->all());
        return redirect(route('subject.index'))->with('message','Edit successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->subjectRepository->delete($id);
        return redirect(route('subject.index'))->with('message','Delete successfully');
    }
}
