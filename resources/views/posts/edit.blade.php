@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('posts.update',$post->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label" >Title</label>
      <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{$post['title']}}" >
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" name="description"> {{ $post['description'] }}</textarea>
    </div>
    
    
    <button type="submit" class="btn btn-success">Edit</button>
  </form>
@endsection