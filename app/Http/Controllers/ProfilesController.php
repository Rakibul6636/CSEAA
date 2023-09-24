<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
class ProfilesController extends Controller
{
    public function index(\App\Models\User $user)
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
            //dd($user->id);
        return view('UserSec.index', compact('user', 'follows', 'postCount','posts'));
    }
    public function show(\App\Models\User $user)
    {
        $follows = (auth()->user())?auth()->user()->following->contains($user->id): false;
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

      //  $followUser = auth()->user()->following()->pluck('profiles.user_id');
      //dd($user->id);
        $posts = Post::where('user_id',$user->id)->with('user')->latest()->paginate(5);

        return view('UserSec.profile-user', compact('user', 'follows', 'postCount','posts','followersCount','followingCount'));
    }
    public function edit(\App\Models\User $user)
    {       $this->authorize('update',$user->profile);
        
            return view('UserSec.pages-account-settings-account',compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
      // dd("hello");
        $data = request()->validate([
            'designation' => '',
            'about' => '',
            'url' => '',
            'image' => '',
            'dob' =>'',
            'gender' =>'',
            'bloodGroup' =>'',
            'fatherName' =>'',
            'motherName' =>'',
            'degree' =>'',
            'session' =>'',
            'batch' =>'',
            'address' =>'',
            'mobile' =>'',
            'workPlace' =>'',
            'cv' =>'',
        ]);
        //dd($data);
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        if (request('cv')) {
            $cvPath = request('cv')->store('profile', 'public');
            $cvArray = ['cv' => $cvPath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
            $cvArray ?? [],
        ));
       
        return redirect("/profile/{$user->id}");
    }
}


