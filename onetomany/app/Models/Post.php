<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // mass assigned
    // this feild is okay to create to receive data
    // never put the id
    protected $fillable = [
        'title',
        'body',
    ];
}
