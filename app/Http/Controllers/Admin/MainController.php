<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        session(['isAdmin' => true]);
        if ($request->query->has('search')) {
            $search = $request->query->get('search');
            $posts = Post::where('id', $search)->orWhere('url', 'LIKE', "%{$search}%")->orWhere('title', 'LIKE', "%{$search}%")->paginate(10);
            $countPosts = count($posts);
            return view('admin.index', compact('posts', 'countPosts', 'search'));
        }
        $posts = Post::paginate(10);
        $countPosts = Post::all()->count();
        return view('admin.index', compact('posts', 'countPosts'));
    }
    public function search($search, Request $request)
    {
        dd($search);
        if (!$request->search) {
            return redirect()->route('admin.index');
        }
        session(['isAdmin' => true]);
        $posts = Post::where('id', $search)->orWhere('url', 'LIKE', "%{$search}%")->orWhere('title', 'LIKE', "%{$search}%")->paginate(10);
        $countPosts = count($posts);
        return view('admin.index', compact('posts', 'countPosts', 'search'));
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
    public function auth(Request $request)
    {
        if ($request->email == env('FOR_ADMIN_EMAIL') && $request->password == env('FOR_ADMIN_PASSWORD')) {
            session(['isAdmin' => true]);
            return redirect()->route('admin.index');
        }
        return redirect()->back();
    }
}
