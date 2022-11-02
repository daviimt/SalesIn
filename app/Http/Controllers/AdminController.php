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
        $users = User::latest()->paginate(5);
        return view('adminViews/adminMenu', compact('users'));

        //dd($users);
        //return view('adminViews/adminMenu');
    }

    public function show(User $user)
    {
        return view('adminViews.show',compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', ['success', __("Usuario eliminado correctamente")]); 
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user-> update(['actived' => '1']);
        return back()->with('message', ['success', __("Usuario Activado")]); 
    }
    public function desactivate($id)
    {
        $user = User::findOrFail($id);
        $user-> update(['actived' => '0']);
        return back()->with('message', ['warning', __("Usuario Desactivado")]); 
    }
}
