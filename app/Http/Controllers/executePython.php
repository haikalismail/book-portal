<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ExecutePython extends Controller
{
    Public function executePython($id){
        $user_id = Auth ::id();

        $book = DB::table("book_items")
        ->select('book_title')
        ->where('book_id',$id)
        ->first();

        //$book_name = $book;
        
        $top_n = 4;

        //pclose(popen("start python C:/Users/Asus/PycharmProjects/knn/ActItemKNN.py $user_id","r"));
        $knn=shell_exec("python C:/Users/Asus/PycharmProjects/knn/ActItemKNN.py --user_id $user_id --top_n $top_n --book_name ".'"'.$book->book_title.'"');
        return $knn;
    }
}