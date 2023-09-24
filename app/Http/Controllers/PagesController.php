<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
class PagesController extends Controller
{
   
    public function welcome(){
        $articles = Article::where('type','1')->latest()->get();
        $presidentMessage = Article::where('type','0')->latest()->get();
        $notice = Article::where('type','7')->latest()->get();

       // dd($articles);
        return view('welcome', compact('articles','presidentMessage','notice'));
        //return view('welcome');
    }
     public function condolence(){
        $articles = Article::where('type','3')->latest()->get();
       // dd($articles);
        return view('/pages/condolence', compact('articles'));
    }
    public function ourMission(){
        $articles = Article::where('type','4')->latest()->get();
        // dd($articles);
         return view('/pages/ourMission', compact('articles'));
    }
    public function constitutions(){
        $articles = Article::where('type','5')->latest()->get();
        // dd($articles);
         return view('/pages/constitutions', compact('articles'));
    }
    public function management(){
        $articles = Article::where('type','6')->latest()->get();
        // dd($articles);
         return view('/pages/management', compact('articles'));
    }
    public function upcomingEvent(){
        $articles = Article::where('type','1')->latest()->get();
        // dd($articles);
         return view('/pages/upcomingEvent', compact('articles'));
    }
    public function pastEvent(){
        $articles = Article::where('type','2')->latest()->get();
        // dd($articles);
         return view('/pages/pastEvent', compact('articles'));
    }
    public function notice(){
        $articles = Article::where('type','7')->latest()->get();
        // dd($articles);
         return view('/pages/notice', compact('articles'));
    }
    public function journal(){
        $articles = Article::where('type','8')->latest()->get();
        // dd($articles);
         return view('/pages/journal', compact('articles'));
    }
    public function articles(){
        $articles = Article::where('type','9')->latest()->get();
        // dd($articles);
         return view('/pages/articles', compact('articles'));
    }

    public function gallery(){
        $articles = Article::where('type','10')->latest()->get();
        // dd($articles);
         return view('/pages/gallery', compact('articles'));
    }
    public function scholarship(){
        $articles = Article::where('type','11')->latest()->get();
        // dd($articles);
         return view('/pages/scholarship', compact('articles'));
    }
    public function sponsor(){
        $articles = Article::where('type','12')->latest()->get();
        // dd($articles);
         return view('/pages/sponsor', compact('articles'));
    }
    public function members(){
        $users = User::where('admin','0')->get();
        // return view('/pages/members');
       // $users =['hello','hi'];
        // return view('/AdminSec/users', compact('users'));
        return view('/pages/members',compact('users'));
    }
    public function contact(){
        return view('/pages/contact');
    }
    public function test(){
        $user = User::where('admin','0')->get();
        // return view('/pages/members');
       // $users =['hello','hi'];
        // return view('/AdminSec/users', compact('users'));
        return view('/pages/test',compact('user'));
        //return view('/pages/test');
    }
}
