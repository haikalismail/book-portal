<HTML>
<HEAD>
<TITLE>Crunchify - Refresh Div without Reloading Page</TITLE>
 
<style type="text/css">
body {
    background-image:
        url('https://cdn.crunchify.com/wp-content/uploads/2013/03/Crunchify.bg_.300.png');
}
</style>
<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<script>
    $(document).ready(
            function() {
                    var randomnumber = Math.floor(Math.random() * 100);
                    $('#show').text(
                            'I am getting refreshed every 3 seconds..! Random Number ==> '
                                    + randomnumber);
                
            });
</script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() { /// Wait till page is loaded
       $('#detailed').click(function(){
          $('#main').load('test.blade.php #main', function() {
               /// can add another function here
          });
       });
    }); //// End of Wait till page is loaded
    </script>
 
</HEAD>
<BODY>
    <br>
    <br>
    <div id="show" align="center"></div>
    
    <a id="detailed">LINK</a>
    <div id="main"></div>    

    <div align="center">
        <p>
            by <a href="https://crunchify.com">Crunchify.com</a>
        </p>
    </div>
</BODY>
</HTML>