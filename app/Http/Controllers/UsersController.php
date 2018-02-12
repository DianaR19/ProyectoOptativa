<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    //
    public function index(){
        $users = User::orderBy('id','ASC')->paginate(5);

        return view ('admin.users.index')->with('users',$users);
    }
    public function create(){
        //dd('Hola esto es un mensaje');
        return view('admin.users.create');
    }

    public function store(UserRequest $request){
        //dd('Exito');
        //$user = new App\User();
        //dd($request->all());
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        //dd($user);
        $user->save();
        //dd('Usuario creado');
        //flash('Se ha registrado '.$user->name." de forma exitosa");
        //return redirect('users.index');
        Flash::success('Se ha registrado '.$user->name." de forma exitosa");
        return redirect()->route('users.index');
    }
    public function destroy($id){
        $user = User::find($id);
        //dd($user);
        $user->delete();

        Flash::error('El usuario '.$user->name." ha sido borrado de forma exitosa!");
        return redirect()->route('users.index');
    }
    public function edit($id){
        //dd($id);
        $user = User::find($id);
        //dd($user);
        return view ('admin.users.edit')->with('user',$user);
        //$user->delete();

        //Flash::error('El usuario '.$user->name." ha sido borrado de forma exitosa!");
        //return redirect()->route('users.index');
    }
    public function update(Request $request, $id){
        //dd($request->all());
        $user = User::find($id);
        /*$user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->save();*/

        //otra manera
        $user->fill($request->all());
        $user->save();

        Flash::warning('El usuario ' . $user->name . ' ha sido editado con exito!');
        return redirect()->route('users.index');
    }
}
