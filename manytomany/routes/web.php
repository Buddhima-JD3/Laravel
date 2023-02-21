<?php

use App\Models\Role;
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

Route::get('/create',function(){
   $user = User::find(1);

//   $role = new Role(['name'=>'Adminstrator']);
   $user->roles()->save(new Role(['name'=>'Adminstrator']));
});

Route::get('/read', function(){
   $user = User::findOrFail(1);

   // looping through the collection and gettting the opobject
   foreach($user->roles as $role ){
//       dd($role);
       // printing a property of thta object
       echo $role->name;
   }
});

Route::get('/update', function(){
   $user = User::findOrFail(1);

   if($user-> has('roles')){
       foreach ($user->roles as $role){
           if($role->name == 'Adminstrator'){
               $role->name = 'subscriber';
                $role->save();
           }
       }
   }
});

Route::get('/delete', function(){
    $user=User::findOrFail(1);
    //deltes all
//    $user->roles()->delete();

    foreach($user->roles as $role){}
    $role->whereId(2)->delete();
});

// it will create another record in the pivot table
Route::get('/attach', function(){
    $user=User::findOrFail(1);
    $user->roles()->attach(2);
});


//detach the role completeley from the pivit table
Route::get('/detach', function(){
    $user=User::findOrFail(1);
    $user->roles()->detach(2);
});

Route::get('/sync', function(){
    $user = User::findOrFail(1);
    $user->roles()->sync([1,2]);
});
