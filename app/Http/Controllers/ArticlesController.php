<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use Laracasts\Flash\Flash;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Image;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function index(Request $request){
        //return view ('admin.articles.index')->with('tags',$tags);
        $articles = Article::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $articles->each( function ($articles){
            $articles->category;
            $articles->user;
        });
        //dd($articles);
        return view ('admin.articles.index')
            ->with('articles',$articles);
    }
    public function create(){
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        //dd($categories);
        $tag = Tag::orderBy('name','ASC')->pluck('name','id');

        return view('admin.articles.create')
            ->with('categories',$categories)
            ->with('tags',$tag);
    }

    public function store(ArticleRequest $request){
        //Manipulacion de Imagenes

        //dd($request->tags);
        if($request->file('image')){
            $file = $request->file('image');
            $name = 'blogFacilito_'. time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/articles/';
            $file->move($path, $name);
        }else{
            $name = "";
        }
        $article = new Article($request->all());
        $article->user_id = Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($article);
        $image->save();
        //dd($article);
        Flash::success('Se ha creado el articulo ' . $article->title . ' de forma satisfactoria');

        return redirect()->route('articles.index');
    }

    public function destroy($id){
        //dd($id);
        $article = Article::find($id);
        $article->delete();

        Flash::error('El articulo '.$article->title." ha sido borrada con exito!");
        return redirect()->route('articles.index');
    }
    public function edit($id){
        //$tag = Tag::find($id);
        //return view ('admin.articles.edit')->with('tag',$tag);
        $article = Article::find($id);
        $article->category;

        $categories = Category::orderBy('name', 'DESC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'DESC')->pluck('name', 'id');

        $my_tags = $article->tags->pluck('id')->ToArray();
        //dd($my_tags);

        return view ('admin.articles.edit')
            ->with('categories', $categories)
            ->with('article', $article)
            ->with('tags',$tags)
            ->with('my_tags', $my_tags);
    }
    public function update(Request $request, $id){
        $article = Article::find($id);
        //dd($article);
        $article->fill($request->all());
        $article->save();

        $article->tags()->sync($request->tags);
        Flash::warning('Se ha editado el articulo ' . $article->title . ' de forma exitosa');
        return redirect()->route('articles.index');
    }
}
