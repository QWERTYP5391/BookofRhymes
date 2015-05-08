<?php
include ("database/dbWord.php");
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

    google.load("feeds", "1");

    function initialize() {
      var query = "<?php echo loadwordNewsFeed(); ?>" ;
      var feed = new google.feeds.Feed("https://news.google.de/news/feeds?pz=1&cf=all&ned=us&hl=us&q=" + query + "&output=rss");
      
      feed.load(function(result) {
        if (!result.error) {
          var container = document.getElementById("feed");
          for (var i = 0; i < result.feed.entries.length; i++) {
            var entry = result.feed.entries[i];
            var div = document.createElement("div");
            div.appendChild(document.createTextNode(entry.title));
            container.appendChild(div);
          }
        }
      });
    }
    google.setOnLoadCallback(initialize);

    </script>
  </head>
  <body>
    <div id="feed"></div>
  </body>
</html>