<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Response;

class PostController extends Controller
{
    public function index(){
          return view("posts.index", [
           'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(),
       ]);
   
    }
    public function show(post $post){
        return view('posts.show', ['post' => $post
    ]);
    }
    public function create(){
        
        return view('posts.create');
   
    }
    public function store(){
        $path=request()->file('thumbnail')->store('thumbnail');
         
        return 'Done:' . $path;
        // $attributes= request()->validate([
        //  'title'=> 'required',
        //  'thumbnail'=> 'required | image',
        //  'slug'=> ['required',Rule::unique('posts','slug')],
        //  'excerpt'=> 'required',
        //  'body'=> 'required',
        //  'category_id'=>['required',Rule::exists('categories','id')]
        // ]);
        // $attributes['user_id']=auth()->id();
        // $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnail');
        // Post::create($attributes);
        // return redirect('/');
    }
   
}
