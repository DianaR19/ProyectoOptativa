<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Laracasts\Flash\Flash;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;


class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','DESC')->paginate(5);
        return view ('admin.categories.index')->with('categories',$categories);
    }
    public function create(){
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request){
        $categories = new Category($request->all());
        //dd($category);
        $categories->save();

        Flash::success('La categoria '.$categories->name." ha sido creada con exitosa");
        return redirect()->route('categories.index');
    }

    public function destroy($id){
        //dd($id);
        $categories = Category::find($id);
        $categories->delete();

        Flash::error('La categoria '.$categories->name." ha sido borrada con exitosa!");
        return redirect()->route('categories.index');
    }
    public function edit($id){
        $categories = Category::find($id);
        return view ('admin.categories.edit')->with('category',$categories);
    }
    public function update(Request $request, $id){
        $categories = Category::find($id);
        $categories->fill($request->all());
        $categories->save();

        Flash::warning('La categoria ' . $categories->name . ' ha sido editada con exito!');
        return redirect()->route('categories.index');
    }
}