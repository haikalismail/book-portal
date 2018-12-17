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
 
        // Execute the python script with the JSON data
        pclose(popen("start python C:/Users/IMPOSSIBLEOO7/PycharmProjects/BookReco/Main3.py $user_id ","r" ));
        //pclose(popen("start /b python C:/Users/IMPOSSIBLEOO7/PycharmProjects/BookReco/Main2.py $user_id ","r" ));

        
       
    }
}
