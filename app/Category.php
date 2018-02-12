<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categorias";

    protected  $fillable = ['name'];

    public function articles(){
        return $this->hasMany('App\Article');
    }
    public function scopeSearch($query, $title){
        return $query-where('title', 'LIKE', "%$title%");
    }
}
