<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admins.users.index', compact('users'));
    }

    public function create()
    {
        return  view('admins.users.create_user');
    }

    public function store(UserRequest $request)
    {
        try {
            $image = config('image.imageUser');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $image = time() . $file->getClientOriginalName();
                $path = public_path(config('image.imageUser'));
                $file->move($path, $image);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => config('image.user_id_default'),
                'avatar' => $image,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('users.index')->with('message_success', trans('validator.message_success'));
        } catch (Exception $exception) {
            return redirect()->route('users.index')->with('message_errors', trans('validator.message_error'));
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);

            return view('admins.users.edit_user', compact('user'));
        } catch (\Exception $ex) {
            return redirect()->route('users.index')->with('message_errors', trans('validator.message_error'));
        }
    }

    public function update(EditUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $image = $user->avatar;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $image = time() . $file->getClientOriginalName();
                $path = public_path(config('image.imageUser'));
                $file->move($path, $image);
            }
            $user->name = $request->name;
            $user->avatar = $image;
            $user->save();

            return redirect()->route('users.index')->with('message_success', trans('validator.message_success'));
        } catch (\Exception $exception) {
            return redirect()->route('users.index')->with('message_errors', trans('validator.message_error'));
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            foreach ($user->posts as $post) {
                $post->delelte();
            }
            $path = public_path(config('image.imageUser'));
            if (file_exists(config($path . $user->avatar))) {
                unlink(config($path . $user->avatar));
            }
            $user->delete();

            return redirect()->route('users.index')->with('message_success', trans('validator.message_success'));
        } catch (\Exception $exception) {
            return route('users.index')->with('message_errors', trans('validator.message_error'));
        }
    }

}
