<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Article;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ArticlesController extends Controller
{

    public function dashboard(\App\Models\User $user)
    {
        $follows = (auth()->user())?auth()->user()->following->contains($user->id): false;
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            });

        // $followersCount = Cache::remember(
        //     'count.followers.' . $user->id,
        //     now()->addSeconds(30),
        //     function () use ($user) {
        //         return $user->profile->followers->count();
        //     });

        // $followingCount = Cache::remember(
        //     'count.following.' . $user->id,
        //     now()->addSeconds(30),
        //     function () use ($user) {
        //         return $user->following->count();
        //     });

        $followUser = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$followUser)->with('user')->latest()->paginate(5);
        $user = auth()->user();
        return view('AdminSec.index', compact('user', 'follows', 'postCount','posts'));
    }
    public function postContent()
    {
        $data = request()->validate([
            'title' => 'required',
            'contentText' => 'required',
            'type' => 'required',
            'image' => ['image'],
        ]);
        $imagePath = request('image')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();
         
        auth()->user()->articles()->create([
            'title' => $data['title'],
            'contentText' => $data['contentText'],
            'type' => $data['type'],
            'image' => $imagePath,
        ]);
       //dd($data);
        return redirect('/admin/dashboard');
    }
    public function show(\App\Models\Article $articleshow)
    {
       // dd($articles);
        //$article = Article::where('id',$articles->id)->get(); 
        return view('pages.articleShow', compact('articleshow'));
    }
    public function postManage()
    {
       // dd($articles);
        //$article = Article::where('id',$articles->id)->get(); 
        $data = request();
        $user = auth()->user();
        $posts = Post::whereIn('user_id',$user)->latest()->paginate(5);
        $articles = Article::where('type',$data['type'])->latest()->get();

       // dd($posts);
        return view('AdminSec.manageArticle', compact('user','posts','articles'));
    }
    public function searchArticle()
    {
       // dd($articles);
        //$article = Article::where('id',$articles->id)->get(); 
        $user = auth()->user();
       // dd($posts);
        return view('AdminSec.searchArticle', compact('user'));
    }
    public function deleteArticle($id)
    {
        $article = Article::where('id', $id)->firstorfail()->delete();
          return redirect()->route('admin.web.dashboard')->withMessage('Article Deleted');
        }
        public function editArticle(\App\Models\Article $id)
    {   
        $user = auth()->user();
        $article = $id;
       // dd($article);
        return view('AdminSec.articleEdit',compact('article','user'));
    }
    public function updateArticle(Article $id)
    {
        $data = request()->validate([
            'title' => 'required',
            'contentText' => 'required',
            'type' => 'required',
            'image' => ['image'],
        ]);
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
         
    //     auth()->user()->articles()->create([
    //         'title' => $data['title'],
    //         'contentText' => $data['contentText'],
    //         'type' => $data['type'],
    //         'image' => $imagePath,
    //     ]);
    //    //dd($data);
    //     return redirect('profile/'.auth()->user()->id);
      
       // dd($id);
       $article = Article::where('id', $id->id)->first();


        $article->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        
       
        $user = auth()->user();
        $posts = Post::whereIn('user_id',$user)->latest()->paginate(5);
        $articles = Article::where('type','1')->latest()->get();

        //dd($article);
        return view('AdminSec.searchArticle', compact('user','posts','articles'));
    }
}
