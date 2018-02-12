<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TestController extends Controller
{
    public function view($id){
        //dd("Hola ya entre a la ruta");

        $article = Article::find($id);

        //return $article;
        //dd($article);
        $article->categoty;
        $article->user;
        $article->tags;

        //dd($article);
        return view('index',['prueba'=>$article]);

    }
}
