<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
class MembersController extends Controller
{
    public function membersInfo(\App\Models\User $user)
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

        return view('pages.members', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }
    public function members()
    {
       // $userAll = User::paginate(3);
       // $userAll = array_chunk($userList, 2, true);

        //$profileAll =  Profile::all();
        // $userAll = json_decode(
        //     array_merge(
        //         json_decode($userObject, true),
        //         json_decode($profileObject, true)
        //     )
        //     );
       // $userAll =json_decode($userObject, true);
       //$users = User::whereNotNull('approved_at')->get();
      $users= User::where([

        ['approved_at', '!=', 'null'],
        ['admin', '=', '0']

    ])->paginate(10);
       // return view('/pages/members');
      // $users =['hello','hi'];
       // return view('/AdminSec/users', compact('users'));
       return view('/pages/members',compact('users'));
        //return view('pages.members',compact('userAll'));

    }
    public function membersData(Request $request){
         // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $userProfile = Profile::query()
    ->where('batch', 'LIKE', "%{$search}%")
    ->orWhere('bloodGroup', 'LIKE', "%{$search}%")
    ->orWhere('designation', 'LIKE', "%{$search}%")

    ->pluck('user_id')
    ->toArray();
    //->get();
   // dd($userProfile);
    $users = User::query()
        ->WhereIn('id', $userProfile)
        ->orwhere('name', 'LIKE', "%{$search}%")
        ->orWhere('username', 'LIKE', "%{$search}%")
        //->get()
      
        ->paginate(10);

    // Return the search view with the resluts compacted
    return view('pages.members', compact('users'));

    }
}
