<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        session(['isAdmin' => true]);
        $posts = Post::paginate(10);
        $countPosts = Post::all()->count();
        // dd($posts);
        return view('admin.index', compact('posts', 'countPosts'));
    }
    public function delete(Request $request)
    {
        $data = $request->json()->all();
        try {
            Post::where('id', $data['post_id'])->delete();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            return response()->json(['status' => false]);
        }
    }
}
