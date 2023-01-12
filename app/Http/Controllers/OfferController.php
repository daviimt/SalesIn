<?php

namespace App\Http\Controllers;

use App\Applied;
use App\Offers; 
use App\Cicles; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;    

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offers::all();
        $cicles = Cicles::all(); 
        $user_id= auth()->id();
        $applies = Applied::where('user_id','!=',$user_id)->with(['offer'])->paginate(20);

        $offers = Offers::select('offers.id', 'offers.title', 'offers.description', 'offers.num_candidates', 'offers.created_at', 'offers.updated_at', 'offers.deleted', 'applieds.offer_id', 'applieds.user_id')
                ->leftJoin('applieds', function($join) use ($user_id) {
                 $join->on('offers.id', '=', 'applieds.offer_id')
                      ->where('applieds.user_id', '=', $user_id);
              })->whereNull('applieds.id')->where('offers.deleted', 0)->paginate(5);
    
        return view('userViews.userView', compact('cicles', 'offers'));
    }

    public function showRegistrationForm()
    {
        $cicles=Cicles::all();
        return view('adminViews.articles.newArticle',compact('cicles'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  array  $data
     */
    protected function create()
    {
        return view('adminViews.articles.newArticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offers::find($id);
        dd($offer);
        return view('userViews.userView',compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function softdel($id)
    {
       
    }

    public function apply($id)
    {
        $offer = Offers::find($id);

        $offer-> update(
            [
            'num_candidates'=> ($offer->num_candidates) +1,
            ]);
        
        $apply = new Applied();
        $apply->create(
            [   
                'offer_id' => $id,
                'user_id' => auth()->id(),
                'deleted' =>'0'
            ]
        );
        return redirect()->back()->with('success','Offer applied successfully');
    }
}
