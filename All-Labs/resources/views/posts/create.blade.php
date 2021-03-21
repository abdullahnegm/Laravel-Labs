@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <select name="user_id" class="form-control">
      <option disabled selected>Choose a creator</option>
        @foreach($users as $user)
          <option value="{{$user['id']}}">{{$user["name"]}}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-success">Create</button>
  </form>
</div>
@endsection