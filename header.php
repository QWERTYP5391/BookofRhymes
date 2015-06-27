<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    </head>
        <?php // Example 26-2: header.php   
  session_start();

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'functions.php';
  require_once 'bootstrapheader.html';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;

  echo "<title>$appname$userstr</title><link rel='stylesheet' " .
       "href='styles.css' type='text/css'>"                     .
       "</head><body><center><canvas id='logo' width='624' "    .
       "height='48'>$appname</canvas></center>"             .
               
       "<script src='javascript.js'></script>";

  if ($loggedin)
  {
    echo 
         "<nav class='navbar navbar-default navbar-fixed-top'>"  .
   
        "<div class='navbar-header'>".
            "<a class='navbar-brand' href='header.php'>School Of Rhymes</a>".
        "</div>".
       " <div>".
            "<ul class='nav navbar-nav'>".
                "<li><a href='members.php?view=$user'>Home</a></li>" .
         "<li><a href='DictionaryPage.php'>Dictionary</a></li>"         .
         "<li><a href='RhymebookPreScreen.php'>Rhymebook</a></li>"         .
             " <li><a href='NewsFeed.php'>News</a></li>".
               " <li><a href='Lyrics.php'>Lyrics</a></li>".
                "<li><a href='Guide.php'>Guide</a></li>"  .
         "<li><a href='profile.php'>Edit Profile</a></li>"    .
         "<li><a href='logout.php'>Log out</a></li></ul><br>".
            "</ul>".
    "</div>".
            "<div class='appname'>$appname$userstr</div>"   . 
"</nav>";

       }
  else
  {
    echo ("<nav class='navbar navbar-default'>"  .
          "<li><a href='index.php'>Home</a></li>"                .
          "<li><a href='signup.php'>Sign up</a></li>"            .
          "<li><a href='login.php'>Log in</a></li></ul><br>"     .
          "<span class='info'>&#8658; You must be logged in to " .
          "view this page.</span><br><br>").
    "</nav>";
  }
?>
