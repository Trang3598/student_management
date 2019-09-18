<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionEditRequest;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Repositories\Permission\PermissionRepository;
use Illuminate\Http\Requests;

class PermissionController extends Controller
{
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Create single post
     *
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Show single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
/*    public function show($id)
    {
        //
    }*/

    /**
     * Create single post
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */

    public function store(PermissionRequest $request)
    {
        $this->permissionRepository->store($request->all());

        return redirect(route('permissions.index'))->with(['success' => 'create success']);
    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->getListById($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update($id, PermissionEditRequest $request)
    {
        $name_edit = $request->all()['name'];
        $permission = $this->permissionRepository->getListById($id);
        $name_update = $permission->name;
        if ($name_edit == $name_update) {
            $this->permissionRepository->update($id, $request->all());
            return redirect(route('permissions.index'))->with(['success' => 'Nothing Update']);
        } else {
            $this->permissionRepository->update($id, $request->all());

            return redirect(route('permissions.index'))->with(['success' => 'Update']);
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
        $this->permissionRepository->destroy($id);

        return redirect(route('permissions.index'))->with('success', 'Delete-success!');
    }
}
