<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'domain/Word.php';

    function load_dbWord() {
      $i = 0;
      $username = "root";
      $password = "School_12";
      $host = "localhost";

      $connector = mysqli_connect($host,$username,$password, "bookofrhymes")
          or die("Unable to connect");
        error_log("Connections are made successfully");
      //execute the SQL query and return records
      $result = mysqli_query($connector, "SELECT * FROM word ");
       while( $row = mysqli_fetch_assoc( $result ))
          {
            echo
            "<tr>
              <td>{$i}</td> 
              <td>{$row['wordname']}</td>
              <td>{$row['definition']}</td>
              <td>{$row['synonyms']}</td>
            </tr>\n";
              $i++;
          }
          mysqli_close($connector);
        }
        
     function add_Word(){
          if((isset($_POST['word_name'])))
    {   {
        error_log("Submit Button pressed");
        $word_name = ($_POST["word_name"]);
        error_log("The word name is ". $word_name);
        $word_def = ($_POST["word_def"]);
        $word_syn = ($_POST["word_syn"]);
        $username = "root";
        $password = "School_12";
        $host = "localhost";
        $connector = mysqli_connect($host,$username,$password, "bookofrhymes")
          or die("Unable to connect");
        error_log("Connections are made successfully");
      //execute the SQL query and return records
        if(mysqli_query($connector, "INSERT INTO word (wordname,definition,synonyms) VALUES ('$word_name','$word_def', '$word_syn')"))
        {
            error_log("Yes, the data was inserted");
        }
        {
            error_log(mysqli_error($connector));
            error_log("No, the data was not inserted");
        }
        mysqli_close($connector);
    }
        unset($_POST['word_name']);
    }
     }
     
     function loadwordNewsFeed()
     {
         $username = "root";
        $password = "School_12";
        $host = "localhost";

      $connector = mysqli_connect($host,$username,$password, "bookofrhymes")
          or die("Unable to connect");
        error_log("Connections are made successfully");
      //execute the SQL query and return records
        $result = mysqli_query($connector, "SELECT * FROM word ");
        $test =  mysqli_query($connector, "SELECT wordname FROM word ");
      $query = " ";
       $i = 0;
          while($row = mysqli_fetch_assoc( $test))
          {

              $query .= $row['wordname']. " ";
          }
          mysqli_close($connector);
          $_POST['word_name'] = null;
          return $query;
     }


   


