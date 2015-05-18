<?php
        include('database/dbWord.php');
 ?>
<!doctype html>
<!-- See http://www.firepad.io/docs/ for detailed embedding docs. -->
<html>

<head>
    <meta charset="utf-8" />
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <!-- Firebase -->
     <script src="https://cdn.firebase.com/js/client/2.0.2/firebase.js"></script>
     <!-- CodeMirror -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/4.5.0/codemirror.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/4.5.0/codemirror.css" />
     <!-- Firepad -->
     <link rel="stylesheet" href="https://cdn.firebase.com/libs/firepad/1.1.0/firepad.css" />
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.firebase.com/libs/firepad/1.1.0/firepad.min.js"></script>
     <!-- Include example userlist script / CSS.
         Can be downloaded from: https://github.com/firebase/firepad/tree/master/examples/ -->
     <script src="firepad-userlist.js"></script>
     <style>
        html { height: 75%; }
        body { margin: 0; height: 175%; }
        /* Height / width / positioning can be customized for your use case.
           For demo purposes, we make the user list 175px and firepad fill the rest of the page. */
        #userlist {
            position: static; left: 0; top: 0; bottom: 0; height: auto;
            width: 175px;

        }
        #firepad {
            position: absolute; left: 200px; top: 30px; bottom: 265px; right: 0; height: auto;
        }
     </style>
</head>
<body>
<?php
    include_once ('menu.html');
    include_once('login.php');
   
?>
<div class="container">
<div id="userlist"></div>
<div id="firepad"></div>
<script>
    function init() {
      //// Initialize Firebase.
      var firepadRef = new Firebase('https://intense-inferno-385.firebaseio.com/Second%20Document')
      // TODO: Replace above line with:
      // var firepadRef = new Firebase('<YOUR FIREBASE URL>');
      //// Create CodeMirror (with lineWrapping on).
      var codeMirror = CodeMirror(document.getElementById('firepad'), { lineWrapping: true });
      // Create a random ID to use as our user ID (we must give this to firepad and FirepadUserList).
      var userId = Math.floor(Math.random() * 9999999999).toString();
      //// Create Firepad (with rich text features and our desired userId).
      var firepad = Firepad.fromCodeMirror(firepadRef, codeMirror,
          { richTextToolbar: true, richTextShortcuts: true, userId: userId});
      //// Create FirepadUserList (with our desired userId).
      var firepadUserList = FirepadUserList.fromDiv(firepadRef.child('users'),
          document.getElementById('userlist'), userId);
      //// Initialize contents.
      firepad.on('ready', function() {
        if (firepad.isHistoryEmpty()) {
          firepad.setText('Check out the user list to the left!');
        }
      });
    }
    init();
     firepad.on('synced', function(isSynced) {
  // isSynced will be false immediately after the user edits the pad,
  // and true when their edit has been saved to Firebase.
});
  </script>
  <nav class="navbar navbar-default navbar-fixed-bottom">
<?php
include ('dictionaryWordTable.html');
?>
</nav>
</div>
</body>
</html>