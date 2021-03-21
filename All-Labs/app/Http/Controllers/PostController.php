<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{

    public function index(){
        return view("posts.index", ['posts' => Post::all()]); //Post::paginate(1)    use it in index -> {{ $posts->links  () }}
    }

    public function show($id){
        $post = Post::find($id);

        // if( Gate::allows('view-post', $post) ){
        //     dd("Allowed");
        // }
        // $response = Gate::allows('view-post', $post);
        // $response = Gate::inspect('view', $post);
        // Gate::authorize('view', $post);
        // dd(SlugService::createSlug(Post::class, 'slug', 'My First Post' . $id, ['unique' => false]));

        return view('posts.show', ["post" => $post]);
    }

    public function create(){
        return view('posts.create', ['posts' => Post::all(), 'users' => User::all()]);
    }

    public function store(StorePostRequest $MyRequest){

        // we used StorePostRequest instead

        // $MyRequest->validate([
        //     'title' => ['required', 'max:100', 'min:6'],
        //     'description' => ['required'],
        // ]); 

        Post::create($MyRequest->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post){
        // dd($id);
        // $post = Post::find($id);
        
        if($post == null)
        return redirect()->route('posts.index');

        if (Auth::id() == $post->user->id) {
            $users = User::all();

            return view('posts.edit', ['post' => $post, 'users' => $users]);
        } else {

            $this->index();
        }
    }

    public function update(Post $id, Request $MyRequest){
        
        $request = $MyRequest->all();
        $array = ['title' => $request['title'], 'description' => $request['description']];
        $post_id = $MyRequest->all()['post_id'];
        $post = Post::find($post_id);

        if( auth()->user()->id == $post->user->id)
            $post->update($array);
        
        return redirect()->route('posts.index');
    }

    public function destroy($id){
        $post= Post::where('id', $id)->delete();

        if( Auth::id() == $post->user->id)
            $post->delete();

        return redirect()->route('posts.index');
    }
    
}
