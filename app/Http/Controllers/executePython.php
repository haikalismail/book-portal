<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use Illuminate\Http\Request;
use Auth;

class ExecutePython extends Controller
{
    public function executePython(){
        // This is the data you want to pass to Python
        $user_id = Auth::id();
        
        $book = DB::table("book_items")
        ->select('book_title')
        ->where('book_id',10)
        ->first();

        $top_n = 5;
 
        // Execute the python script with the JSON data
        (shell_exec("python C:/Users/Asus/PycharmProjects/knn/ActItemKNN.py --user_id $user_id --top_n $top_n --book_name ". '"'.$book->book_title.'"'));
        //pclose(popen("start /b python C:/Users/IMPOSSIBLEOO7/PycharmProjects/BookReco/Main2.py $user_id ","r" ));

        
       
    }
}
