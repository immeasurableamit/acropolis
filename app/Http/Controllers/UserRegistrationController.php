<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\UserRegisterService;
use App\Http\Requests\UserCreateRequest;

class UserRegistrationController extends Controller
{
    protected $userService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRegisterService $userService)
    {
        $this->userService = $userService;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.register.create', ['url' => 'user']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createUser(UserCreateRequest $request)
    {
        $this->userService->createUser($request);
        flash('User create successfully!');
        return redirect()->route('users.list');
    }

    public function showUsers()
    {
        $users = $this->userService->get();
        return view('admin.register.index', ['url' => 'user'], compact('users'));
    }

    public function userDetails($id)
    {
        $user = $this->userService->getById($id)->first();
        return view('admin.register.details', ['url' => 'user'], compact('user'));
    }

    public function editUsers($id)
    {
        $user = $this->userService->getById($id)->first();
        return view('admin.register.edit', ['url' => 'Edit user'], compact('user'));
    }

    public function editUpadte()
    {
        $this->userService->updateUser(request('id'));
        flash('User has been updated!');
        return redirect()->route('users.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $destination = PROFILE_PICTURE_IMAGE_PATH . '/' . $user->id . '/' . $user->profile_picture;
        if (\File::exists($destination)) {
            \File::delete($destination);
        }

        $post = User::where('id', $id)->delete();


        return response()->json(['success'=>'User deleted successfully', $post]);
    }
}
