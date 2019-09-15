<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserEloquentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserEloquentRepository $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = $this->userRepository->getAll();
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
//        $roles = Role::all();
//        $role = $roles->pluck('name', 'id')->all();
        $role = Role::pluck('name', 'name')->all();
        return view('admin.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $user = $this->userRepository->create($request->all());
        $user->assignRole($request->input('level'));
        return redirect(route('user.index'))->with('message', 'Add successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = $this->userRepository->find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'roles')->all();
        return view('admin.user.edit', compact('user', 'roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        $user = $this->userRepository->update($id, $request->all());
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect(route('user.index'))->with('message', 'Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return redirect(route('user.index'))->with('message', 'Delete successfully');
    }

}
