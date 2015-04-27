<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'domain/Word.php';

    function load_dbWord() {
       
        $query = "SELECT * FROM word"; 
        error_log('in select_dbDates query is ' . $query);
        $word = array();
        $result = mysql_query($query);
        mysql_close();
        if (!$result) 
        {
            error_log('Error');
            return null;
        }
        else 
        {
           while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
            {
                    $word_name = $row[0];
                    $word_definiiton = $row[1];
                    $word_synonym = $result_row[2];
                    $word[] = new Word($word_name, $word_definiiton, $word_synonym);     
            }   
         }
            return $word;
        }


   


