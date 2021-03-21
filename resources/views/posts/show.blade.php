@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title"><b>Title: </b> {{$post['title']}}</h5>
      <p class="card-text"><b>Description: </b>{{$post['description']}}</p>
    </div>
  </div>
  <br/>
  <div class="card">
    <div class="card-header">
      Post Creator Info
    </div>
    <div class="card-body">
      <p class="card-text"><b>name: </b> {{$post->user->name}} </p>
      <p class="card-text"><b>E-mail: </b>{{$post->user->email}}</p>
      <p class="card-text"><b>Created At: </b>{{$post['created_at']}}</p>
    </div>
  </div>
 
@endsection
