
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Personal Dictionary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .table-sortable tbody tr {
            cursor: move;
        }

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src =js/dictionaryTable.js></script>
</head>
<body>
  <?php
      $username = "root";
      $password = "School_12";
      $host = "localhost";

      $connector = mysql_connect($host,$username,$password)
          or die("Unable to connect");
        error_log("Connections are made successfully");
      $selected = mysql_select_db("bookofrhymes", $connector)
        or die("Unable to connect");
      //execute the SQL query and return records
      $result = mysql_query("SELECT * FROM word ");
   ?>
<script> var i = 0;</script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Book Of Rhymes</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="mainPage.html">Home</a></li>
                <li class="active"><a href="DictionaryPage.php">Dictionary</a></li>
                <li><a href="Rhymebook.html">Rhyme Book</a></li>
                <li><a href="NewsFeed.html">News Feed</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                <tr >
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Word
                    </th>
                    <th class="text-center">
                        Definition
                    </th>
                    <th class="text-center">
                        Synonyms
                    </th>
                </tr>
                </thead>
                <tbody>
        <?php
         $i = 0;
          while( $row = mysql_fetch_assoc( $result ))
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
        ?>
                </tbody>
            </table>
         <?php mysql_close($connector); ?>
        </div>
    </div>
    <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
</div>

</body>
</html>
