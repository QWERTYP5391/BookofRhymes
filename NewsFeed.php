<?php
        include_once('database/dbWord.php');
 ?>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="js/wordTable.js"></script>
     <style type="text/css">
    #feedGadget { 
      margin-top : 20px;
      margin-left: auto;
      margin-right: auto;
      width : 440px;
      font-size: 16px;
      color: #9CADD0;
    }   
     </style>
     <script src="https://www.google.com/jsapi/?key=internal-sample" type="text/javascript"></script>
  <script src="http://uds.googleusercontent.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js" type="text/javascript"></script>
  <script type="text/javascript">
    function showGadget() {
      var feeds = [
       {title:'People',
        url:'http://rss.people.com/web/people/rss/topheadlines/index.xml'},
       {title:'E-Online',
        url:'http://www.eonline.com/syndication/feeds/rssfeeds/topstories.xml'},
       {title:'TMZ',
        url:'http://www.tmz.com/rss.xml'}];

      new GFdynamicFeedControl(feeds, 'feedGadget',
                               {numResults : 3, stacked : true,
                               title: "Hollywood News"});
    }
    google.load("feeds", "1");
    google.setOnLoadCallback(showGadget);
  </script>
</head>
<body>
<?php
include ('menu.html');
?>
<div id ="content" class="navbar navbar-default">   
<script>
google.load("feeds", "1");

function OnLoad() {
  var query = "<?php echo loadwordNewsFeed(); ?>" ;
  google.feeds.findFeeds(query, findDone);
}

function findDone(result) {
  // Make sure we didn't get an error.
  if (!result.error) {
    // Get content div
    var content = document.getElementById('content');
    var html = '';

    // Loop through the results and print out the title of the feed and link to
    // the url.
    for (var i = 0; i < result.entries.length; i++) {
      var entry = result.entries[i];
      html += '<p><a href="/feed/v1/' + entry.url + '">' + entry.title + '</a></p>';
    }
    content.innerHTML = html;
  }
}

google.setOnLoadCallback(OnLoad);
</script>
</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
<?php
    include ('dictionaryWordTable.html');
?>
</nav>
</body>
</html>