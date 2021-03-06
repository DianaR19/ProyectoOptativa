<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Article extends Model
{
    use Sluggable;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'save_to'=> 'slug'
            ]
        ];
    }

    /*protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug'
    ];*/

    protected  $table = "articles";

    protected  $fillable = ['title','content','category_id','user_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
    public function scopeSearch($query, $title){
        return $query->where('title', 'LIKE', "%$title%");
    }
}
