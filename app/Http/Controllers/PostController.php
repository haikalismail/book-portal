<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use App\book_author;
use App\book_category;
use App\book_contributor;
use App\book_genre;
use App\book_items;
use App\book_publisher;
use App\book_rating;
use App\user_reader;
use App\read_record;
use App\book_review;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$author=book_author::all();
        $category=book_category::all();
        $contributor=book_contributor::all();
        $genre=book_genre::all();
        $items=book_items::all();
        $publisher=book_publisher::all();
        $rating=book_rating::all();
        $record=read_record::all();
        $review=book_review::all();
        $reader=user_reader::all();
        return view('posts.index')->with('reader',$reader,'author',$author);*/

        return View::make('pages.dashboard')
        ->with('author', book_author::all())
        ->with('category', book_category::all())
        ->with('contributor', book_contributor::all())
        ->with('genre', book_genre::all())
        ->with('item', book_items::all())
        ->with('publisher', book_publisher::all())
        ->with('rating', book_rating::all())
        ->with('record', read_record::all())
        ->with('review', book_review::all())
        ->with('reader', user_reader::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 123;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=user_reader::find($user_id);
        $book=book_items::find($book_id);
        return View::make('pages.index')
        ->with( 'user',$user)
        ->with( 'user',$user);
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
