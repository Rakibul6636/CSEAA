<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Article;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function NewsFeed()
    {    
        $user = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$user)->with('user')->latest()->paginate(5);
        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['image'],
        ]);
        $imagePath = request('image')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        return redirect('profile/'.auth()->user()->id);
    }

    public function show(\App\Models\Article $post)
    {
       // dd($post);
        return view('posts.show',[
            'post' => $post,
        ]);
    }
    public function deletePost($id)
    {
        $post = Post::where('id', $id)->firstorfail()->delete();
        return redirect('profile/'.auth()->user()->id);
        }
}
