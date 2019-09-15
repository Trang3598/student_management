<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleEloquentRepository;
use App\Repositories\RolePermissionRepositorry;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $roleRepository;
    protected $rolePermissionRepositorry;
    protected $permission;

    public function __construct(RoleEloquentRepository $roleRepository, RolePermissionRepositorry $rolePermissionRepositorry, PermissionRepository $permission)
    {
        $this->roleRepository = $roleRepository;
        $this->rolePermissionRepositorry = $rolePermissionRepositorry;
        $this->permission = $permission;
        parent::__construct();
        $this->middleware('permission:role-list');
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
//        $this->middleware('permission:role-addPermission', ['only' => ['setPermission', 'addPermission']]);
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.role.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permission = Permission::get();
        return view('admin.role.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->roleRepository->store($request->all());
        return redirect(route('roles.index'))->with('message', 'Add successfully');
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
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        $role = $this->roleRepository->find($id);
        return view('admin.role.edit', compact('role', 'rolePermissions', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->roleRepository->update($id, $request->all());
        return redirect(route('roles.index'))->with('message', 'Edit successfully');
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
        $this->roleRepository->delete($id);
        return redirect(route('roles.index'))->with('message', 'Delete successfully');
    }

    public function setPermission($id)
    {
        $role = $this->roleRepository->find($id);
        $permissions = Permission::all();
        return view('admin.role.role_permission', compact('permissions', 'role'));
    }

    public function addPermission(Request $request, $id)
    {

        $role = $this->roleRepository->find($id);
        $data = [];
        foreach ($request->permission_id as $item => $value) {
            array_push($data, [
                'permission_id' => $request->permission_id[$item],
                'role_id' => $role->id,
            ]);
            $roles = $this->rolePermissionRepositorry->store($data[$item]);
//            $roles->assignRole($request->input('roles'));
        }
        return redirect()->back()->with('message', 'Addsuccessfully');
    }
}
