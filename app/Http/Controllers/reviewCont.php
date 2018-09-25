<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book_review;
use DB;

class reviewCont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {   

        $review = book_review::where('review_id','!=','3')
        ->where('user_id',session('userid'))
        ->orderBy('review_date','desc')->get();
        $userreview = book_review::where('review_id','3')
        ->where('user_id',session('userid'))
        ->get();

        
        return view('books.singlebook')
        ->with('userreview',$userreview)
        ->with('review',$review);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.singlebook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id )
    {
        $this->validate($request,[
            'body'=>'required',
        ]);
        
        //create review
        $review = new book_review;
        
        $review->review = $request->input('body');
        $review->user_id = session('userid');
        $review->book_id = $id;
        $review->timestamps = false;
        $review->save();

        return redirect()->action('BooksController@show',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = book_review::find($id);
        return view('portal.showreview')->with('review',$review);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
