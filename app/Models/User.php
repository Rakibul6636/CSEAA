<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'studentId',
        'admin', 
        'doc',
        'approved_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
        static::created(function ($user){
            $user->profile()->create();
            // $user->profile()->create([
            //     'title' =>$user->username,
            // ]);
        }); 
    }
    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }
    public function articles()
    {
        return $this->hasMany(Article::class)->orderBy('created_at','DESC');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class)->orderBy('created_at','ASC');
    }
    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at','DESC');
    }
}
