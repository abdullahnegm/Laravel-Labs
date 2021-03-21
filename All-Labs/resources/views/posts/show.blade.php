@extends('layouts.app')

@section("title")
<title>Post</title>
@endsection

@section('content')
  <div class="card" style="background-color: lightyellow;">
  @if($post)
    <div class="card-header">
      Post Details
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post['title']}}</h5>
      <p class="card-text">
      {{$post['description']}} <br>
      Posted By: {{$post->user->name}}  <3
      </p>
    </div>
    @else
      <h4> Record Doesn't Exist </h4>
    @endif
  </div>
@endsection
