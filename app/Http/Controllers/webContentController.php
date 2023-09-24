<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Message;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class webContentController extends Controller
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
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
         
        auth()->user()->content()->create([
            'title' => $data['title'],
            'contentText' => $data['contentText'],
            'type' => $data['type'],
            'image' => $imagePath,
        ]);
       dd($data);
        return redirect('admin.web.dashboard');
    }
    public function storeMessage()
    {
        //dd("hello");
        $data = request()->validate([
            'senderName' => 'required',
            'subject' => 'required',
            'senderEmail' => 'required',
            'text' => 'required',
        ]);
       // dd($data);
        $newMessage = new Message;
                $newMessage->senderName = $data['senderName'];
                $newMessage->senderEmail = $data['senderEmail'];
				$newMessage->subject = $data['subject'];
				$newMessage->text = $data['text'];
                $newMessage->user_id = 1;
				$newMessage->save();
      // dd($data);
      return redirect()->route('message.guest')->withMessage('your message sent successfully');
    }
    public function unreadMessage()
    {
        $user = auth()->user();
        $messages = Message::whereNull('read_at')->get();
       // return view('/pages/members');
      // $users =['hello','hi'];
        return view('/AdminSec/contactMessage', compact('messages','user'));
        //return view('/UserSec/generateDonationReport', compact('users'));

    }
    public function readMessage()
    {
        $user = auth()->user();
        $messages = Message::whereNotNull('read_at')->get();
       // return view('/pages/members');
      // $users =['hello','hi'];
        return view('/AdminSec/contactMessageRead', compact('messages','user'));
        //return view('/UserSec/generateDonationReport', compact('users'));

    }
    public function messageRead($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['read_at' => now()]);

        return redirect()->route('message.unread')->withMessage('Message added to read list');
    }
    public function MessageDelete($id)
    {
        $message = Message::where('id', $id)->firstorfail()->delete();
          return redirect()->route('message.unread')->withMessage('Message Deleted');
        }
}
