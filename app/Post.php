<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'content'
    ];

    /**
     * relation with category
     */

     public function category() {
         return $this->belongsTo('App\Category');
     }

     public function Tag() {
         return $this->belongsToMany('App\Tag');
     }
}
