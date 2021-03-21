<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

use App\Models\Post;

class PostController extends Controller
{
    function index(){

        return PostResource::collection(Post::all());
    }

    function show($post){

        return new PostResource(Post::find($post));
    }
}
