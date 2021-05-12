<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Country;
use Illuminate\Support\Facades\Facade;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use PHPUnit\Framework\Constraint\Count;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*



Route::get('/admin/posts/home' ,array('as'=> 'admin.home', function(){

    $url = route('admin.home');

    return "link is $url";
}));
*/

Route::get('/test/post/{id}/',[PostsController::class,'index']);

/*

Route::resource('posts',"App\Http\Controllers\PostsController");

Route::get('/contact/{id}/{name}/{pass}',"App\Http\Controllers\PostsController@contact");

Route::get('/me/{id}/{yup}',"App\Http\Controllers\PostsController@test");
*/


Route::get('/insert', function(){

DB::insert('INSERT INTO posts (title,body) values(?,?)',['Hello2','Its me']);

});

/*
Route::get('/read', function () {
    $results =  DB::select('select * from posts where id = ?', [1]);

    foreach($results as $result){
        echo $result->title;
    }
});

Route::get('/update/{id}', function ($id) {
    $updated = DB::update("update posts set title = 'New title $id' where id = ?", [$id]);
  return "id $id has been updated";
});


Route::get('/delete/{id}', function ($id) {
    DB::delete("DELETE from posts where id = ?", [$id]);

    return "Row $id has been deleted";
});
*/

Route::get('/read', function () {
    $posts = Post::all();

    foreach($posts as $post){
        echo $post->title;
    }
});
Route::get('/find/{id}', function ($id) {
    $posts = Post::where('id',$id)->get();

    foreach($posts as $post){
        return $post->title;
    }



});
//Eloquent where functionality
Route::get('/findmore', function () {
    $posts = Post::where('id','>',3)->get();

     foreach ($posts as $post ) {
         # code...
         echo $post->body;
     }

});


// Eloquent Insert Statement

Route::get('/insert', function () {
    $post = new Post;
    $post->title = "Hey I inserted this";
    $post->body = "Haha so funny";

    $post->save();
});
// Eloquent Update Statement
Route::get('update/{id}', function ($id) {
    $post = Post::find($id);
    $post->title = "New Update bitches";
    $post->body = "I look like this, i look like that";

    $post->save();
});

// Eloquent Create Functions, Great with forms

Route::get('/create', function () {
  Post::create(['title'=>'New year new me','body'=> 'Hahahahahhahaha']);
});

//Eloquent update with more than 1 condition

Route::get('/update2', function () {
    Post::where('author','nosa')->update(['title'=>'New double']);
});

//Eloquent Delete with find(primary key)

Route::get('/delete/{id}', function ($id) {
    $post = Post::find($id);

    $post->delete();
});

Route::get('delete2', function () {
    Post::destroy(6);
    Post::where('author','nosa')->delete();
});

Route::get('/softdeletes', function () {
    Post::find(8)->delete();
});

//Eloquent read softdelete functionality
Route::get('/readsoftdelete', function () {
  /*  $posts = Post::find(5);

     return $posts;
*/
$posts = Post::onlyTrashed()->get(); // only deleted items

return $posts;
});
//Eloquent read softdelete functionality
Route::get('/readsoftdelete', function () {
    /*  $posts = Post::find(5);

       return $posts;
  */
  $posts = Post::withTrashed()->get(); // deleted and available items

  return $posts;
  });

  Route::get('/restore', function () {
      Post::onlyTrashed()->restore();
  });

  //eloquent Force Delete

  Route::get('forcedelete', function () {
      Post::onlyTrashed()->find(8)->forceDelete();
  });

  //Eloquent Relationships One -to - One


  Route::get('users/{id}/posts', function ($id) {

    return User::find($id)->post->title;
  });

// inverse relationship
  Route::get('posts/{id}/user', function ($id) {

    return Post::find($id)->user->name;
  });


  //Eloquent One to Many relationship

  Route::get('users/{id}/allposts', function ($id) {

      $user = User::find($id);
      $posts = $user->posts;
      foreach($posts as $post){
          echo $post;
      }
  });

  //Many to Many Relationship

  Route::get('/roles', function () {
      $role = Role::find(1);
      echo $role->user;
  });

  Route::get('/user/role', function () {
      $user = User::find(1);
      echo $user->roles;
  });
  //Accessing the pivot table
Route::get('/access/pivot', function () {
    $user = User::find(1);
    foreach ($user->roles as $role){
        echo $role->created_at;
    }
});

//Has many through relationship

Route::get('/user/country', function () {
    $country = Country::find(1);
    echo $country->posts;
});
