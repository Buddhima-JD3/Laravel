<?php

use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Post;
use App\Models\User;
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

//Route::get('/about', function () {
//    return "Hi about page";
//});
//
//Route::get('/contact', function () {
//    return "Hi I am contact";
//});
//
//Route::get('/post/{id}/{name}', function ($id, $name) {
//    return "THis is post number ". $id. " ". $name;
//});
//
//Route::get('admin/posts/example', array('as'=>'admin.home', function () {
//
////    This is how you can access this route from the name using the anchor tag
////    <a href= "route('admin.home')"> CLICK HERE </a>
//    $url = route('admin.home');
//    return "this url is ". $url;
//}));

//Using controller only index method for the Route
//Route::get('/posts/{id}', [PostsController::class, 'index']);

//Route::resource('/posts', PostsController::class);

//Route::get('/contact',[PostsController::class, 'contact']);
//
//Route::get('post/{id}/{name}/{password}',[PostsController::class, 'show_post']);

/*
|--------------------------------------------------------------------------
| Database RAW SQL Queries
|--------------------------------------------------------------------------
*/

//
//
//Route::get('/insert',function(){
//   DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel is awsome with Edin', 'Laravel is the best thing that has happened to PHP']);
//
//});

// Read the data in the "post" table

//Route::get('/read', function(){
//  $results = DB::select('select * from posts where id = ?', [1]);
//
//  return var_dump($results);
//
////  foreach ($results as $post){
////      return $post -> title;
////  }
//
//});

// Update the Table

//Route::get('/update', function(){
//  $updated  = DB::select('update posts set title = "Update title" where id =  ?', [1]);
//
//  return   $updated;
//});

// Delete the Table

//Route::get('/delete', function(){
//  $deleted = DB::delete('delete from posts where id = ?', [1]);
//
//  return $deleted;
//});

/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
*/

// Reading

//Route::get('/read', function(){
//
//    $posts = Post::all();
//
//    foreach ($posts as $post){
//         return $post->title;
//    }
//});

// Finding

//Route::get('/find', function(){
//
//    $posts = Post::find(2);
//
////    foreach ($posts as $post){
////        return $post->title;
////    }
//    return $posts->title;
//
//});


// Finding an ID

//Route::get('/findwhere', function (){
//
//    $posts = Post::where('id',3)->orderBy('id', 'desc')->take(1)->get();
//    return $posts;
//});

// Find more ways

//Route::get('/findmore', function (){
//
////    $posts = Post::findOfFail(1);
////    return $posts;
//
//      $posts = Post::where('useres_count', '<', 50)->firstOrFail();
//
//});


// Basic Way of Inserting

Route::get('/basicinsert', function(){

    $post = new Post;

    $post->title = 'New Eloquesnt title insert';
    $post->content = 'Wow eloquent is really cool, look at this content';

    $post->save();
});



// Basic Way of Inserting
//
//Route::get('/basicinsert', function(){
//
//    $post = Post::find(2);
//
//    $post->title = 'New Eloquesnt title insert';
//    $post->content = 'Wow eloquent is really cool, look at this content 2';
//
//    $post->save();
//});


// Creating new Data
Route::get('/create',function(){
   Post::create(['title'=>'the create method', 'content'=>'Wow I\'am learning alot with Edwin Diaz']);
});

// updating Data
//Route::get('/update',function(){
//   Post::where('id',2)->where('is_admin',0)->update(['title'=>'NEW PHP TITLE','content'=>'I love my instructor Edwin']);
//});

// deleting Data
Route::get('/delete',function(){
  $post = Post::find(7);

  $post->delete();
});


// another way in deleting Data
//Route::get('/delete2',function(){
//  Post::destroy([4,5]);
//  Post::where('is_admin',0)->delete();
//});


//Soft Deleting
//Route::get('/softdelete', function(){
//
//    Post::find(1)->delete();
//
//});
//
//Route::get('/readsoftdelete', function(){

//    $post = Post::find(1);
//    return $post;

    //Bring items that are trashed and not trashed
//    $post = Post::withTrashed()->where('id',0)->get();
//    return $post;

//    Bring items that are trashed
//      $post = Post::onlyTrashed()->where('id',1)->get();
//      return $post;

//});

// Restoring the Delete

//Route::get('/restore', function(){
//
//        Post::withTrashed()->where('is_admin', 0)->restore();
//});

//To Delete something Permennantly

//Route::get('/forcedelete', function (){
//
//    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
//});


/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
*/

// One to one relationship

//Route::get('/user/{id}/post', function ($id){
//   return User::find($id)->post->title;
//});

// inverse of one to one relationship

//Route::get('/post/{id}/user', function($id){
//    return Post::find($id)->user->name;
//});

// One to Many Relationsihips

//Route::get('/posts', function (){
//    $user=User::find(1);
//
//    foreach ($user->posts as $post){
//        echo $post->title. "<br>";
//    }
//});

// Many to Many Relationsihips

//Route::get('/user/{id}/role', function($id){
//    $user = User::find($id)->roles()->OrderBy('id', 'desc')->get();

//    foreach($user-> roles as $role){
//        return $role-> name;
//    }
//});


// Accessing the intermidiate table / pivot

//Route::get('user/pivot', function(){
//
//    $user = User::find(1);
//
//    foreach ($user->roles as $role){
//
//        return $role->pivot->created_at;
//    }
//});
//
//Route::get('/user/country', function(){
//
//    $country = Country::find(4);
//     foreach ($country->posts as $post){
//       return $post->title;
//     };
//});

// polymmorphic relations

//
//Route::get('user/photos', function(){
//
//    $user = User::find(1);
//
//        foreach($user->photos as $photo){
//             return $photo;
//        }
//
//});
//
//
//Route::get('post/photos', function(){
//
//    $post = Post::find(1);
//
//    foreach($post->photos as $photo){
//        echo  $photo->path;
//    }
//
//});
//
//Route::get('post/{id}/photos', function($id){
//
//    $post = Post::find($id);
//
//    foreach($post->photos as $photo){
//        echo  $photo->path . "<br>";
//    }
//
//});

//Route::get('photo/{id}/post', function($id) {
//   $photo = Photo::findOrFail($id);
//   return $photo->imageable;
//
//
//});


//Polymorphic Many to Many

//Route::get('/post/tag', function(){
//   $post = Post::find(1);
//
//   foreach($post->tags as $tag){
//       echo $tag->name;
//   }
//});
//$post = Post::find(1);


Route ::get('/tag/post', function(){
   $tag = Tag::find(2);

   foreach ($tag->posts as $post){
       echo $post->title;
   }
});
