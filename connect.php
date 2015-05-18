<?php
$connection = mysql_connect('localhost', 'root', 'School_12');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('bookofrhymes');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}