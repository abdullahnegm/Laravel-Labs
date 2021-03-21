@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{ route('posts.update', [ 'id' => $post['id'] ]) }}">
    @csrf
    <input type="hidden" name="_method" value="PUT">

    <input type="hidden" value="{{ $post['id'] }}" name="post_id" />
    
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" value="{{ $post['title'] }}">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" class="form-control">{{ $post['description'] }}</textarea>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <select name="user_id" class="form-control">
      <option disabled selected>Choose a creator</option>
        @foreach($users as $user)
          <option {{ ($post->user->id == $user['id'])? 'selected' : '' }} value="{{$post['id']}}">{{$user['name']}}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-success">edit</button>
  </form>
</div>
@endsection