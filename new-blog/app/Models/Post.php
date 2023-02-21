<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    // if you have different names in the table and primary key use the following
//    protected $table = 'posts';
//    protected $primaryKey = 'post_id';

    protected $dates = ['deleted_at'];


protected $fillable = [
    'title',
     'content'
];

public function user(){
    return $this->belongsTo('App\Models\User');
}

public function photos(){
    return $this->morphMany('App\Models\Photo','imageable');
}

public function tags(){
    return $this->morphToMany('App\Models\Tag', 'taggable');
}


}

