@extends('welcome')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">新規投稿</div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">本文</label>
                            <div class="col-md-9">
                                <textarea name="body" id="body" style="resize: none; height: 200px; width: 100%">{{ old('body') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lat" class="col-md-2 col-form-label text-md-right">緯度</label>
                            <div class="col-md-9">
                                <input id="lat" type="number" step="0.000001" class="form-control" name="lat" value="{{ old('lat') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lng" class="col-md-2 col-form-label text-md-right">経度</label>
                            <div class="col-md-9">
                                <input id="lng" type="number" step="0.000001" class="form-control" name="lng" value="{{ old('lng') }}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-secondary" onClick="history.back()">戻る</button>
                                <button type="submit" class="btn btn-primary ml-3" name='action' value='add'>
                                    投稿
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
