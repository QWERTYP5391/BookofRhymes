<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    </head>
    
    <body>
<?php
require_once 'header.php';
         require_once 'database/dbGuide.php';
           if (!$loggedin) die();
include_once('guideTable.html');
include_once ('guidemethods.html');
?>
</body>
</html>
