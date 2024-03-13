<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create(Request $request)
    {
        $lat = $request->query('lat');
        $lng = $request->query('lng');

        return view('posts.create', compact('lat', 'lng'));
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function edit(Int $id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Int $id)
    {
        $post = Post::find($id);

        $post->fill($request->all())->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Int $id)
    {
        // 選択された記事データを取得
        $post = Post::find($id);

        // 削除処理実行
        $post->delete();

        // 記事一覧画面へ
        return redirect()->route('posts.index');
    }
}
