
<?php
    $user_id = Auth ::id();

$book = DB::table("book_items")
->select('book_title')
->where('book_id',10)
->first();

//$book_title=trim($book,"[{book_title:}]");

$top_n = 4;

//echo($book->book_title);

//pclose(popen("start python C:/Users/Asus/PycharmProjects/knn/ActItemKNN.py $user_id","r"));
echo(shell_exec("python C:/Users/Asus/PycharmProjects/knn/ActItemKNN.py --user_id 10 --top_n $top_n --book_name ".'"'.$book->book_title.'"'));

?>

