<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class FrontController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }
    public function index(){
        $articles = Article::orderBy('id','DESC')->paginate(3);
        $articles->each(function ($articles){
            $articles->category;
            $articles->images;
        });
        return view('front.index')
            ->with('articles', $articles);
    }
    public function searchCategory($name){
        $category = Category::SearchCategory($name)->first();
        $articles = $category->articles()->paginate(4);
        $articles->each(function ($articles){
            $articles->category;
            $articles->images;
        });
        return view('front.index')
            ->with('articles', $articles);
    }
    public function searchTag($name){
        //$tag = Tag::SearchTag($name)->first();
        /*$articles = $tag->articles()->paginate(4);
        $articles->each(function ($articles){
            $articles->category;
            $articles->images;
        });
        return view('front.index')
            ->with('articles', $articles);*/
    }

    public function viewArticle($slug){
        $article = Article::findBySlugOrFail($slug);

        dd($article);
    }
}
