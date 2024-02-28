<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // すべての記事を取得
        $articles = Article::all(); // ここを追記

        // 記事一覧を表示
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 投稿内容保存処理
        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // ビューから渡されたIDの記事を取得
        $article = Article::find($id);

        // 記事詳細画面を表示
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Int $id)
    {
        // ビューから渡されたIDの記事を取得
        $article = Article::find($id);

        // 記事編集画面を表示
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Int $id)
    {
        // 選択された記事データを取得
        $article = Article::find($id);

        // 編集処理実行
        $article->fill($request->all())->save();

        // 記事一覧画面へ
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id)
    {
        // 選択された記事データを取得
        $article = Article::find($id);

        // 削除処理実行
        $article->delete();

        // 記事一覧画面へ
        return redirect()->route('articles.index');
    }
}
