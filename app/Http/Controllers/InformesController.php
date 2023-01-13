<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Articles;
use App\Cicles;
use App\Offers;
use App\Applied;



class InformesController extends Controller
{

        public function general() {
        $user_id= auth()->id();
        $applies = Applied::where('user_id','==',$user_id)->with(['offer'])->paginate(20);
        $offers = Offers::select('offers.id', 'offers.title', 'offers.description', 'offers.num_candidates', 'offers.created_at', 'offers.updated_at', 'offers.deleted', 'applieds.offer_id', 'applieds.user_id')
        ->leftJoin('applieds', function($join) use ($user_id) {
         $join->on('offers.id', '=', 'applieds.offer_id')
              ->where('applieds.user_id', '=', $user_id);
        })->get();

        $pdf = \PDF::loadView('general',compact('offers',$offers));;
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('prueba.pdf');
        }
      
}



