<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book_rating;
use App\book_items;
use DB;

class ratingCont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'rating'=>'required',
        ]);
        
        //create rating
        $rating = new book_rating;
        
        $rating->rating = $request->input('rating');
        $rating->user_id = session('userid');
        $rating->book_id = $id;
        $rating->timestamps = false;
        $rating->save();

        
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
        //
    }

    /**
     * Update the specified resource in storage.     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'rating'=>'required',
        ]);
        
        if (book_rating::where('book_id', '=', $id)
        ->where('user_id',session('userid'))
        ->exists()) {
            // user found
        //create rating
        
        $ratings = book_rating::where('book_id', '=', $id)
        ->where('user_id',session('userid'))
        ->first();
        $ratings->rating = $request->input('rating');
        $ratings->user_id = session('userid');
        $ratings->book_id = "$id";
        $ratings->timestamps = false;
        $ratings->save();
        
        return redirect()->action('BooksController@show',$id);
        }
        else{
            self::store($request,$id);
            
            return redirect()->action('BooksController@show',$id);
        }

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


    
}



