<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users = User::paginate(10);
        return view('adminViews/adminMenu', compact('users'));

        //dd($users);
        //return view('adminViews/adminMenu');
    }

    public function show(User $user)
    {
        return view('adminViews.show',compact('user'));
    }


    public function softdel($id)
    {
        $user = User::find($id);
        $user->deleted = 1;
        $user-> update();
        return back()->with('message', ['success', __("Usuario eliminado correctamente")]); 
    }

    
    public function activate($id)
    {
        $user = User::find($id);
        $user->actived = 1;
        $user-> update();
        return back()->with('message', ['success', __("Usuario Activado")]); 
    }
    
    public function desactivate($id)
    {
        $user = User::find($id);
        $user->actived = 0;
        $user-> update();
        return back()->with('message', ['warning', __("Usuario Desactivado")]); 
    }

    public function edit(User $user)
    {
        return view('adminViews.edit', compact('user'));
    }

    public function update(Request $request,$id){

        $user = User::findOrFail($id);

        $data = $request->only('name','surname','email');

        if(trim($request->password)=='')
        {
            $data=$request->except('password');
        }
        else{
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);
        return view('adminViews.show',compact('user'),['warning', __("Usuario Desactivado")]);
    }

    
}

