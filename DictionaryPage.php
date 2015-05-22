<?php
         require_once 'header.php';
         require_once 'database/dbWord.php';
           if (!$loggedin) die();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Personal Dictionary</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
       
    </style>
</head>
<body>
<?php

include ('dictionaryWordTable.html');
include ('wordmethods.html');
?>
</body>
</html>
