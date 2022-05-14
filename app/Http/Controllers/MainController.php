<?php

namespace App\Http\Controllers;

use App\Helpers\Ru2lat;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function store(Request $request)
    {
        try {
            $rules = [
                'title' => ['required', 'min:2'],
                'story' => ['required'],
                'author' => [],
                'mediaMaterials' => []
            ];
            $messages = [
                'title.required' => 'Title is too small',
                'title.min' => 'Title is too small',
                'story.required' => 'Empty content',
            ];
            $validator = Validator::make($request->json()->all(), $rules, $messages, []);
            if ($validator->fails()) {
                return response()->json(['status' => 'validate_error', 'messages' => $validator->errors()->all()]);
            }
            $data = $request->json()->all();
            DB::beginTransaction();
            foreach ($data['mediaMaterials'] as $key => $media) {
                if ($media['mediaType'] == 'image') {
                    $image_64 = $media['mediaValue'];
                    $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
                    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                        $image = str_replace($replace, '', $image_64);
                        $image = str_replace(' ', '+', $image);
                        $imageName = 'images' . '/' . Str::uuid() . '-' . Str::uuid() . '.' . $extension;
                        Storage::disk('local')->put($imageName, base64_decode($image));
                        $data['mediaMaterials'][$key]['mediaValue'] = $imageName;
                    } else {
                        $data['mediaMaterials'][$key]['mediaValue'] = '';
                    }
                }
            }
            $url = preg_replace('/[^a-zA-Zа-яА-Я0-9]/ui', '-', $data['title']);
            $converted_url = Ru2lat::convert($url);
            $url = $converted_url . '-' . Carbon::now()->format('d-m-Y-H-i-s');
            while ($chechUrl = DB::table('posts')->where('url', $url)->first()) {
                $url = $converted_url . '-' . Carbon::now()->format('d-m-Y-H-i-s') . '-' . Str::random(3);
            }
            $uuid = Str::uuid();
            session(['uuid_user' => $uuid]);
            $post = Post::create([
                'title' => $data['title'],
                'url' => $url,
                'author' => $data['author'],
                'media_materials' => json_encode($data['mediaMaterials']),
                'uuid' => $uuid,
                'story' => $data['story']
            ]);
            DB::commit();
            return response()->json(['status' => true, 'message' => $post]);
        } catch (\Exception $e) {
            DB::rollback();
            return $request->json([$e->getMessage()]);
        }
    }
    public function edit($url)
    {
        $post = Post::where('url', $url)->first();
        // dd($post);
        if ($post) {
            $post->media_materials = json_decode($post->media_materials);
            return view('edit', ['post' => json_decode($post)]);
        }
        return view('errors.404');
    }
}
