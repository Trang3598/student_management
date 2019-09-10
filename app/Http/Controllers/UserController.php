<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserEditRequest;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function edit($id)
    {
        $user = $this->userRepository->getListById($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UserEditRequest $request, $id)
    {
        $this->userRepository->update($id, $request->all());

        return redirect()->back()->with(['success' => 'Update success']);
    }

    public function change($id)
    {
        $user = $this->userRepository->getListById($id);
        return view('admin.users.change', compact('user'));
    }

    public function changed($id, PasswordRequest $request)
    {
        /*        $user = $this->userRepository->getListById($id);
                $oldpassword = $user['password'];
                $data = $request->all();
                dd($data['password_old']);*/
        return view('admin.users.change', compact('user'));
    }
}
