@extends('layouts.app')

@section("title")
<title>Posts</title>
@endsection

@section('content')
<a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
  <div class="container">
    <table class="table  mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">posted by</th>
            <th scope="col">created at</th>
            <th scope="col">actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post['id']}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post['created_at']? $post['created_at']->format('M d Y') : ""}}</td>
            <td class="col">
                <a href="{{ route('posts.show', [ 'id' => $post['id'] ]) }}" class="btn btn-info">View</a> 
                @if(auth()->user()->id == $post->user->id)
                <a href="{{ route('posts.edit', [ 'id' => $post['id'] ]) }}" class="btn btn-primary">Edit</a>
                @endif
                <a href="{{ route('posts.destroy', ['id' => $post['id'] ]) }}" class="btn btn-danger delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div style="width: 30px; display: inline;">
      </div> 
      <div>

      <script>
        let delete_btn = document.getElementsByClassName("delete");

        for(let i=0; i<delete_btn.length; i++){
          delete_btn[i].addEventListener("click", delete_listener);
        }
        function delete_listener(e){
          let answer = confirm("Do you really want to delete this record ?")
          if(answer != true)
            e.preventDefault();
        }
      </script>
@endsection
    