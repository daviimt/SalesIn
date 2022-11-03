<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        return view('home');
    }

    public function verify($id)
    {
        $user = User::findorFail($id);
        $user->update(['email_verified_at' => now()]);
        $user->save();
        return redirect('/');

    }

    public function enviarEmail(){
        $data = [
            'emailto' => "raul.reyesmangano@salesianos.edu",
            'subject' => "Mensaje importante",
            'content' => "Este es un correo de prueba",
        ];

        Mail::send('vistaEmail', $data, function ($message) use($data) {
            $message->from('micorreo@gmail.com');
            $message->to($data['emailto'])->subject($data['subject']);
        });

        return back();
}


}
