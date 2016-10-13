<!DOCTYPE html>
<html>

<?php
	require "twitter.php";
	$client=new tweet_API();
	$tweets=$client->search_by_hashtag("#custserv");
?>

<head>
	<meta charset="utf-8">      
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			background-color: #d9edf7;
		}
	    .tweet{
        border-radius: 4px 4px 4px 4px;
		-moz-border-radius: 4px 4px 4px 4px;
		-webkit-border-radius: 4px 4px 4px 4px;
		border: 0px solid #000000;
        -webkit-box-shadow: 8px 8px 8px -5px rgba(0,0,0,0.75);
		-moz-box-shadow: 8px 8px 8px -5px rgba(0,0,0,0.75);
		box-shadow: 8px 8px 8px -5px rgba(0,0,0,0.75);
		background-color: #1cb7e6;
		margin-top: 8px;
		margin-bottom: 8px;
      }
      p{
      	text-align: right;
      }
    </style>
	<title>Tweets</title>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<h1>Popular Tweets with #custserv</h1>
		</div>
		<div class="container">
			<?php
				foreach($tweets as $tweet){
					echo "<div class=\"container tweet\">"."<h3>".$tweet["text"]."</h3>"."<p>".$tweet["user_name"]."<br>Retweeted ".$tweet["retweets"]." times</p>"."</div>";
				}
			?>			
		</div>
	</div>
</body>
</html>