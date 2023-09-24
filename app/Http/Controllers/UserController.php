<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function waitinglist()
    {
      $user = auth()->user();
        $users = User::whereNull('approved_at')->get();
       // return view('/pages/members');
      // $users =['hello','hi'];
        return view('/AdminSec/tables-basic', compact('users','user'));
        //return view('/UserSec/generateDonationReport', compact('users'));

    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }
    public function reject($user_id)
    {
        $user = User::where('id', $user_id)->firstorfail()->delete();
          return redirect()->route('admin.users.index')->withMessage('User Rejected');
        }

        public function connectionList()
        {
            // $users = User::whereNull('approved_at')->get();
           // return view('/pages/members');
          // $users =['hello','hi'];
            // return view('/AdminSec/tables-basic', compact('users'));
            //return view('/UserSec/generateDonationReport', compact('users'));
            $followUser = auth()->user()->following()->pluck('profiles.user_id');
               //dd($followUser);
            $userLists = User::whereIn('id',$followUser)->get();
          
       // $posts = Post::whereIn('user_id',$followUser)->with('user')->latest()->paginate(5);
        $user = auth()->user();
           
        return view('UserSec.connection', compact('userLists','user'));
    
        }

        
}
