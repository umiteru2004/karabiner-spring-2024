@extends('welcome')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">新規投稿</div>
                <div class="card-body">
                    <form action="{{ route('articles.update', $article->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $article->title) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">本文</label>
                            <div class="col-md-9">
                                <textarea name="body" id="body" style="resize: none; height: 200px; width: 100%">{{ old('body', $article->body) }}</textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-secondary" onClick="history.back()">戻る</button>
                            <button type="submit" class="btn btn-primary ml-3" name='action' value='add'>
                                編集
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
