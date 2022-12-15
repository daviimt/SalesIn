<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Cicles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;    

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::where('deleted','=','false')->orderBy('created_at','desc')->paginate(5);
        return view('adminViews.articles.index', compact('articles'));
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

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file = $request -> file('image');
    
        $name = $file->getClientOriginalName();
    
        \Storage::disk("image")->put($name, \File::get($file));

        $request = Articles::create([
            'title' => $request['title'],
            'image' => $name,
            'description' => $request['description'],
            'cicle_id'=>$request['cicle'],
        ]);

        return redirect()->route('articles.index')
                        ->with('success','Article Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('adminViews.editArticle', compact('article'));
        $cicles=Cicles::all();
        return view('adminViews.articles.edit', compact('cicles'))->with(['article'=>Articles::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article=Articles::find($id);
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'cicle_id' => 'required',
        ]);
        
        $file = $request -> file('image');
        if($file!=''){

            $name = $file->getClientOriginalName();
            
            \Storage::disk("image")->put($name, \File::get($file));

            $article->image = $name;
        }
  
        $article->update([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'cicle_id' => $request->get('cicle_id'),
            ]);
       
        return redirect()->route('articles.index')
                        ->with('success','Article updated successfully');

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
        $article = Articles::find($id);
        $article->deleted = 1;
        $article-> update();
        return back()->with('success', "Article successfully deleted"); 
    }
}
