<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
 </head>
<body>
 <?php
    include_once('database/dbWord.php');
    include ('menu.html');
 ?>
 <div id ="container">
<?php
     $splitQuery = [];
     $query = loadwordNewsFeed();
     $splitQuery = explode(" ", $query);
     $randomNumber = rand(1, sizeof($splitQuery) - 2 );
     $filename = "http://api.chartlyrics.com/apiv1.asmx/SearchLyricText?lyricText=" . $splitQuery[$randomNumber];
     $xml = simplexml_load_file($filename);
    foreach ($xml->SearchLyricResult as $SearchLyricResult)
    {
        echo "<li class='title'><a href = \"$SearchLyricResult->SongUrl\">$SearchLyricResult->Song</a></li>";
    }
?>
 </div>
</body>
</html>
