<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    function load_dbGuide() {
      $i = 0;
      $username = "root";
      $password = "School_12";
      $host = "localhost";

      $connector = mysqli_connect($host,$username,$password, "bookofrhymes")
          or die("Unable to connect");
        error_log("Connections are made successfully");
      //execute the SQL query and return records
      $result = mysqli_query($connector, "SELECT * FROM guide ");
       while( $row = mysqli_fetch_assoc( $result ))
          {
            echo
            "<tr>
              <td>{$i}</td> 
              <td>{$row['sentence']}</td>
              <td>{$row['revised_sentence']}</td>
            </tr>\n";
              $i++;
          }
          mysqli_close($connector);
        }
        
     function add_Phrase()
        {
          if((isset($_POST['sentence'])))
    {
        error_log("Submit Button pressed");
        $sentence = ($_POST["sentence"]);
        error_log("The sentence is ". $sentence);
        $revised_sentence = ($_POST["revised_sentence"]);
        $username = "root";
        $password = "School_12";
        $host = "localhost";
        $connector = mysqli_connect($host,$username,$password, "bookofrhymes")
          or die("Unable to connect");
        error_log("Connections are made successfully");
      //execute the SQL query and return records
        if(mysqli_query($connector, "INSERT INTO guide (sentence,revised_sentence) VALUES ('$sentence','$revised_sentence')"))
        {
            error_log("Yes, the data was inserted");
        }
        {
            error_log(mysqli_error($connector));
            error_log("No, the data was not inserted");
        }
        mysqli_close($connector);
        unset($_POST['sentence']);
    }
     }
     
    


   


