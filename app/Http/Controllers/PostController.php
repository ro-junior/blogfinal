<?php

namespace App\Http\Controllers;

use App\Models\GroupElement;
use App\Models\Post;
use App\Models\PostElement;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('web.post.compose');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        function generateRandomString($length = 12)
        {
            $str = '';
            $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';


            for ($i = 0; $i < $length; $i++) {
                $char = substr($charset, rand(0, strlen($charset) - 1), 1);
                $str .= $char;
            }

            return $str;
        }

        function reorderArrayKeys($array, $order)
        {
            $orderedArray = [];

            foreach ($order as $key) {
                if (array_key_exists($key, $array)) {
                    $orderedArray[$key] = $array[$key];
                }
            }

            return $orderedArray;
        }

        // dd($request->all());

        $POSTAGEM = Post::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'path' => generateRandomString(),
        ]);


        foreach ($request->element as $element) {

            $GROUP_ELEMENT = GroupElement::create([
                'post_id' => $POSTAGEM->id,
                'template' => $element['template'],
            ]);

            $element = reorderArrayKeys($element, ['title', 'image', 'paragraph']);

            foreach ($element as $key => $value) {
                if ($key == 'image') {
                    $value = Storage::disk('public')->putFileAs('post/' . $POSTAGEM->path, $value, $value->getClientOriginalName());
                }

                // dd($key, $value)
                // echo var_dump($value) . '<br><br><br><br>';
                PostElement::create([
                    'group_id' => $GROUP_ELEMENT->id,
                    'type' => $key,
                    'content' => $value
                ]);
            }
        }

        return redirect()->route('post.show', ['auth' => $request->user_id, 'path' => $POSTAGEM->path]);
    }

    /**
     * Display the specified resource.
     */
    public function show($auth, $path)
    {

        $POSTAGEM = Post::where('path', $path)->where('user_id', $auth)->firstorFail();
        return view('web.post.details', ['post' => $POSTAGEM]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
