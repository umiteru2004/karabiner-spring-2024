@extends('welcome')

@section('body')
<div class="container post-form-container">
    <form action="{{ route('posts.store') }}" method="POST" class="post-form">
        @csrf
        <h2>新規投稿</h2>
        <input id="title" type="text" class="post-title-input" name="title" value="{{ old('title') }}" placeholder="タイトル">
        <textarea name="body" id="body" class="post-body-textarea" style="resize: none; height: 200px; width: 100%">{{ old('body') }}</textarea>
        <input id="lat" type="number" step="0.000000000000001" class="form-control" name="lat" value="{{ $lat }}" hidden>
        <input id="lng" type="number" step="0.000000000000001" class="form-control" name="lng" value="{{ $lng }}" hidden>
        <div class="post-form-button-container">
            <button type="button" class="btn btn-secondary post-form-button post-form-back-button" onClick="history.back()">戻る</button>
            <button type="submit" class="btn btn-primary ml-3 post-form-button post-form-create-button" name='action' value='add'>
                投稿
            </button>
        </div>
    </form>
</div>
@endsection
