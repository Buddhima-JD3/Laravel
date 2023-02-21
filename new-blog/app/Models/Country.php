<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts(){
//    Default Mode shown below with the last two columns -> it is going to look at for the country_id automatically from the User Table and user_id from the Post Table
//        return $this->hasManyThrough('App\Models\Post','App\Models\User', 'country_id','user_id');
        return $this->hasManyThrough('App\Models\Post','App\Models\User');
    }
}
