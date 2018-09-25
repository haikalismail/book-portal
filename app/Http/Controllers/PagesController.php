<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use View;
use DB;
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

class PagesController extends Controller
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

        /*$book_author = \App\book_author::with(['book'])->get();

        return View::make('posts.show')->with('book_author',$book_author);*/

        /*return View::make('pages.index')
        ->with('book_author', book_author::all())
        ->with('book_category', book_category::all())
        ->with('book_contributor', book_contributor::all())
        ->with('book_genre', book_genre::all())
        ->with('book_item', book_items::all())
        ->with('book_publisher', book_publisher::all())
        ->with('book_rating', book_rating::all())
        ->with('read_record', read_record::all())
        ->with('book_review', book_review::all())
        ->with('user_reader', user_reader::all());*/

       /* $items = DB :: table('book_items')
                ->join('book_publisher','book_publisher.publisher_id','=','book_items.publisher_id')
                ->get();
        
        $rating = DB :: table('book_rating')
                ->join('book_items','book_items.book_id','=','book_rating.book_id')
                ->get();
        
        $category = DB :: table('book_category')
                    ->join('book_genre','book_genre.genre_id','=','book_category.genre_id')
                    ->join('book_items','book_items.book_id','=','book_category.book_id')
                    ->get();

        $author = DB :: table('book_contributor')
                ->join('book_items','book_items.book_id','=','book_contributor.book_id')
                ->join('book_author','book_author.author_id','=','book_contributor.author_id')
                ->get();*/
        
        //$item_rating = array_combine($items,$rating);
        //$category_author = array_combine($category,$author);
        //$book = array_combine($item_rating,$category_author);
        //return $author;

        /*return view('pages.index')->with('items',$items)
                                  ->with('rating',$rating)
                                  ->with('category',$category)
                                  ->with('author',$author);*/
        
                                  $books = DB::table('book_items')
                                  ->leftjoin('book_publisher', 'book_publisher.publisher_id', '=', 'book_items.publisher_id')
                                  ->leftjoin('book_category', 'book_category.book_id', '=', 'book_items.book_id')
                                  ->leftjoin('book_genre', 'book_genre.genre_id', '=', 'book_category.genre_id')
                                  ->get();
                                  return view ('pages.index') -> with ('books', $books);
        
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
    public function store(Request $request)
    {
        //
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

    public function search()
    {
        $q = Input::get ('q');
        if($q != ''){
            $items = book_items::where('book_id', 'LIKE', '%'. $q .'%') 
                            ->orWhere('book_title', 'LIKE', '%'. $q .'%')
                            ->orWhere('book_isbn', 'LIKE', '%'. $q .'%')
                            ->get();
            if(count($items) > 0)
                return view ('pages.search')->withDetails ($items)->withQuery ($q);
            else
                return view ('pages.search')->withMessage ("Oops!, record not found. Please try again");
        }
        return view ('pages.search')->withMessage ("Oops!, record not found. Please try again");
    }
}
