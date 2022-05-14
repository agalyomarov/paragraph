<?php

namespace App\Http\Controllers;

use App\Helpers\Ru2lat;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
                $url = strtolower($converted_url) . '-' . Carbon::now()->format('d-m-Y-H-i-s') . '-' . Str::random(3);
            }
            if (Session::has('uuid_user')) {
                $uuid = session('uuid_user');
            } else {
                $uuid = Str::uuid();
                session(['uuid_user' => $uuid]);
            }
            $post = Post::create([
                'title' => $data['title'],
                'url' => strtolower($url),
                'author' => $data['author'],
                'media_materials' => json_encode($data['mediaMaterials']),
                'uuid' => $uuid,
                'story' => $data['story']
            ]);
            DB::commit();
            return response()->json(['status' => true, 'message' => $post]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([$e->getMessage()]);
        }
    }
    public function edit($url)
    {
        $post = Post::where('url', $url)->first();
        // dd($post);
        if ($post) {
            $isAuthor = false;
            if (session('uuid_user') == $post->uuid || session('isAdmin') == true) {
                $isAuthor = true;
            }
            $post->media_materials = json_decode($post->media_materials);
            return view('edit', ['post' => json_decode($post), 'isAuthor' => $isAuthor]);
        }
        return view('errors.404');
    }
    public function update($url, Request $request)
    {
        try {
            $post = Post::where('url', $url)->first();

            if (!$post) {
                return response()->json(['status' => false, 'messages' => 'Url not found']);
            }
            if ($post->uuid != session('uuid_user') && session('isAdmin') != true) {
                return response()->json(['status' => false]);
            }
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
            // return response()->json([$data]);
            DB::beginTransaction();
            foreach ($data['mediaMaterials'] as $key => $media) {
                if ($media['mediaType'] == 'image') {
                    if ($media['mediaData'] == 'base64') {
                        $image_64 = $media['mediaValue'];
                        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
                        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                            $image = str_replace($replace, '', $image_64);
                            $image = str_replace(' ', '+', $image);
                            $imageName = 'images' . '/' . Str::uuid() . '-' . Str::uuid() . '.' . $extension;
                            Storage::disk('local')->put($imageName, base64_decode($image));
                            $data['mediaMaterials'][$key]['mediaValue'] = $imageName;
                        }
                    } else if ($media['mediaData'] == 'url') {
                        $imageUrl = $media['mediaValue'];
                        $explodes = explode('.', $imageUrl);
                        $contents = file_get_contents($imageUrl);
                        $imageName = 'images' . '/' . Str::uuid() . '-' . Str::uuid() . '.' . $explodes[count($explodes) - 1];
                        Storage::put($imageName, $contents);
                        $data['mediaMaterials'][$key]['mediaValue'] = $imageName;
                    } else {
                        $data['mediaMaterials'][$key]['mediaValue'] = '';
                    }
                }
            }
            Post::where('url', $url)->update([
                'title' => $data['title'],
                'author' => $data['author'],
                'media_materials' => json_encode($data['mediaMaterials']),
                'story' => $data['story']
            ]);
            DB::commit();
            $media_materials = json_decode($post->media_materials);
            foreach ($media_materials as $key => $media) {
                if ($media->mediaType == 'image') {
                    if (Storage::disk('local')->exists($media->mediaValue)) {
                        Storage::disk('local')->delete($media->mediaValue);
                    }
                }
            }
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
