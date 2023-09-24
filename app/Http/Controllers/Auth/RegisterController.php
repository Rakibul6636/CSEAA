<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth;
use App\Notifications\NewUser;
use Intervention\Image\Facades\Image;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
 
        $data = request()->validate([
            'name' => 'required',
            'email'=>'email',
            'doc' => ['required','image'],
            'password'=>'',
            'username'=>'',
            'studentId'=>'',
        ]);
        $imagePath = request('doc')->store('uploads','public');
        //dd($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        $user = User::create([
            'name' => $data['name'],
            'email'=>$data['email'],
            'username'=>$data['username'],
            'doc' => $imagePath,
            'studentId' => $data['studentId'],
            'password' => Hash::make($data['password']),
        ]);
        

    $admin = User::where('admin', 1)->first();
    $rakib = User::where('id',5);
    if ($admin) {
        $admin->notify(new NewUser($user));
    }

    return $user;
    }
}
