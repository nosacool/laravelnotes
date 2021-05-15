<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'posts';
    protected $fillable = [
     'title',
     'body',
     'author'

    ];

    public function user() {

        return $this->belongsTo(User::class);

    }

    public function photos(){
        return $this->morphMany(Photo::class,'imageable');
    }
}
