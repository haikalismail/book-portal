<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book_items;
use App\book_author;
use DB;
use App\book_review;
use App\book_rating;
use App\book_genre;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Welcome to Laravel!';
        return view ('books.index', compact('title'));
       
    }

    public function category()
    {
        
        $books = book_items::all();
        return view ('books.category') -> with ('books', $books);



    }

    public function testjoin(){


    $books = DB::table('book_items')
        ->leftjoin('book_contributor', 'book_contributor.book_id', '=', 'book_items.book_id')
        ->leftjoin('book_author', 'book_author.author_id', '=', 'book_contributor.author_id')
        ->leftjoin('book_publisher', 'book_publisher.publisher_id', '=', 'book_items.publisher_id')
        ->leftjoin('book_category', 'book_category.book_id', '=', 'book_items.book_id')
        ->select('book_items.*','book_publisher.publisher_name', 'book_author.author_fname', 
        'book_author.author_lname')
        ->get();

        return $books;

    }



    public function about()
    {
        return view ('books.about');
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
        $booksingle = DB::table('book_items')
        ->leftjoin('book_publisher', 'book_items.publisher_id','=','book_publisher.publisher_id')
        ->where(['book_id'=>$id])
        ->first();

        $genre=DB::table('book_genre')
        ->leftjoin('book_category', 'book_genre.genre_id', '=', 'book_category.genre_id')
        ->where(['book_id'=>$id])
        ->first();
        
        
        $contributor = DB::table('book_contributor')
        ->leftjoin('book_author', 'book_contributor.author_id','=','book_author.author_id')
        ->where(['book_id'=>$id])
        ->get();

        $rating = book_rating::leftjoin('user_reader', 'book_rating.user_id','=','user_reader.user_id')
        ->where(['book_id'=>$id])
        ->where('book_rating.user_id',session('userid'))
        ->first();

        $reviews = book_review::leftjoin('user_reader', 'book_review.user_id','=','user_reader.user_id')
        ->where('book_review.user_id','!=',session('userid'))
        ->where('book_id',$id)
        ->orderBy('review_date','desc')
        ->paginate(10);
        $userreviews = book_review::leftjoin('user_reader', 'book_review.user_id','=','user_reader.user_id')
        ->where('book_review.user_id',session('userid'))
        ->where('book_review.book_id',$id)
        ->first();

        return view('books.singlebook') 
        ->with('book', $booksingle)
        ->with('authors',$contributor)
        ->with('ratings',$rating)
        ->with('reviews',$reviews)
        ->with('userreviews',$userreviews)
        ->with('genre', $genre)
        ;
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
