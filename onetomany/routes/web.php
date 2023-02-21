<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
    $user = User::findOrFail(1);
//    $post = new Post(['title'=>'MY fisrt post', 'body'=>'the body']);
    $user->posts()->save(new Post(['title'=>'MY seconed post', 'body'=>'the second body']));
});

Route::get('/read', function(){
   $user =  User::findOrFail(1);

   // This user can many posts
    foreach($user->posts as $post){
        echo $post->title . "<br>";
    }

//    return $user->posts;

    //dive dump

    // this returns a collection
//    dd($user->posts);
});

Route::get('/update', function(){
   $user = User::find(1);
   //add methods anbd chain to it
   $user->posts()->whereId(2)->update(['title'=>'updatasdfdsed the tititle', 'body'=>'updated body']);
//   $user->posts()->whereId('id', '=', 2)->update(['title'=>'updatsdfdsfed the tititle', 'body'=>'updated body']);
});

Route::get('/delete', function(){
    $suer = User::find(1);

//    $suer->posts()->whereId(1)->delete();
    $suer->posts()->delete();


});
