<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts =  Post::all();
        return view('admins.blogs.index', compact('posts'));
    }

    public function create()
    {
        return view('admins.blogs.create_blog');
    }

    public function store(PostRequest $request)
    {
        try {
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = time() . $file->getClientOriginalName();
                $path = public_path(config('image.imagePost'));
                $file->move($path, $name);
                $post->image = $name;
            } else {
                $post->image = config('image.default');
            }
            $post->user_id = 1;
            $post->save();

            return redirect()->route('posts.index')->with('Message_success', trans('validator.message_success'));
        } catch (Exception $e) {
            return redirect()->route('posts.index')->with('Message_errors', trans('validator.message_error'));
        }
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            $post = Post::findOrFail($id);

            return view('admins.blogs.edit_blog', compact('post'));
        } catch (Exception $ex) {
            return redirect()->back()->with('Message_errors', trans('validator.message_error'));
        }
    }

    public function update(PostRequest $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->body = $request->body;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if (file_exists(config('image.imagePost') . $post->image)) {
                    unlink(config('image.imagePost') . $post->image);
                }
                $name = time() . $file->getClientOriginalName();
                $file->move(config('image.imagePost'), $name);
                $post->image = $name;
            }
            $post->save();

            return redirect()->route('posts.index')->with('Message_success', trans('validator.message_success'));
        } catch (Exception $exception) {
            return redirect()->back()->with('Message_errors', trans('validator.message_error'));
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            if (file_exists(config('image.imagePost' . $post->image))) {
                unlink(config('image.image.Post' . $post->image));
            }
            $post->delete();

            return redirect()->route('posts.index')->with('Message_success', trans('validator.message_success'));
        } catch (Exception $ex) {
            return redirect()->back()->with('Message_errors', trans('validator.message_error'));
        }
    }

}
