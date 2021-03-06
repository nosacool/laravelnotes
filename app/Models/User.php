<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){

        return $this->hasOne(Post::class);
    }

    public function posts(){

        return $this->hasMany(Post::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class)->withPivot('created_at');
    }

    public function photos(){
        return $this->morphMany(Photo::class,'imageable');
    }

    // This is called an accessor , it allows you manipulate a value using the camel case
    // function name style convention.
    public function getNameAttribute($value){
        return ucwords($value);
    }
}

//To customize table names and columns follow format below
// return $this->belongsToMany(Role::class,'table_name','column');

