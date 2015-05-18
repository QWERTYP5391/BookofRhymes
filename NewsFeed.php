<?php
        include_once('database/dbWord.php');
       include_once ('menu.html');
    include_once('login.php');
 ?>
<html>
<head>
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="https://www.google.com/jsapi/?key=internal-sample" type="text/javascript"></script>
    <script src="http://uds.googleusercontent.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js" type="text/javascript"></script>
</head>
<body>
<div id ="content">
<script>
    var query = "<?php echo loadwordNewsFeed(); ?>" ;
        <?php 
                $splitQuery = [];
                $query = loadwordNewsFeed();
                $splitQuery = explode(" ", $query);
                $randomNumber = rand(1, sizeof($splitQuery) - 2 );
                error_log($randomNumber);
        ?>
        var randomindex = <?php echo $randomNumber?>;
google.load("feeds", "1");

function feed_init() {
    
	findfeed2ulist("<?php echo $splitQuery[$randomNumber]?>",25,"Feed","content");
}
 
google.setOnLoadCallback(feed_init);
function findfeed2ulist(keyword,num_max,title,target){
	var feed = new google.feeds.findFeeds(keyword,display);
 
  function display(result){
	if (!result.error && result.entries.length > 0){
		var container = document.getElementById(target);
		var htmlstr = "";
		for (var i = 0; i < result.entries.length; i++) {
			var entry = result.entries[i];
				if (entry.link != location.href && num_max > i){
		  			htmlstr += "<li><a href='" + entry.link + "'>" + entry.title + "</a></li>";
		  		} else { num_max++;}
		}
 
		if (htmlstr != ""){
			container.innerHTML = "<li class='title'>Related Posts</li>" +htmlstr;
                        
  		}
  	}
  }
}
</script>
</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
<?php
    include ('dictionaryWordTable.html');
?>
</nav>
</body>
</html>