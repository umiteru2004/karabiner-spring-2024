@extends('welcome')

@section('body')
<div class="container post-form-container">
  <div class="post-form">
    @if(isset($post))
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    @endif
    @if(isset($post))
    <div class="text-center post-form-button-container">
      <button type="button" class="btn btn-secondary post-show-button post-form-back-button" onClick="history.back()">戻る</button>
      <form style="display:inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger ml-3 post-show-button">
          {{ __('削除') }}
        </button>
      </form>
      <button type="button" class="btn btn-primary ml-3 post-show-button post-form-create-button" onClick="location.href='{{ route('posts.edit', $post->id) }}'">
        編集
      </button>
    </div>
    @endif
  </div>
</div>
@endsection
