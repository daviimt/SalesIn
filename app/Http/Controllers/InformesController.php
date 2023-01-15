<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Articles;
use App\Cicles;
use App\Offers;
use App\Applied;
use App\User;



class InformesController extends Controller
{

        public function general() {
        $offers = Offers::all();
        $cicles = Cicles::all(); 
        $user_id= auth()->id();
        $user = User::find($user_id);

        $offers = Offers::select('offers.id', 'offers.title', 'offers.description','offers.cicle_id', 'offers.num_candidates', 'offers.created_at', 'offers.updated_at', 'offers.deleted', 'applieds.offer_id', 'applieds.user_id')
                ->leftJoin('applieds', function($join) use ($user_id) {
                 $join->on('offers.id', '=', 'applieds.offer_id')
                      ->where('applieds.user_id', '=', $user_id);
              })->whereNotNull('applieds.id')->where('offers.deleted', 0)->get();

        $pdf = \PDF::loadView('general',compact('offers',$offers,'cicles',$cicles,'user',$user));;
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('prueba.pdf');
        }
      
}



