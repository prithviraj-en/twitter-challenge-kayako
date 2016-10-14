<?php

require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

//catch exceptions
class tweet_API{

	//the oauth connection handler 
	private $connection;

	//twitter app specific keys
	private $access_token="3368069441-HiKfV6cEdTOeI4gFZbcKDgbIsoa3DweBiZ5BRZk";
	private $access_token_secret="iTu358VxlYsGJDxInLd1TnR7igs2gFDWMa2svHXFLgxzo";
	private $consumer_key="qUJP0QiullM4pQ2eek3ThQjdV";
	private $consumer_secret="ZsaPB14pWoWtG0XrsENdMQL62rbNqA4MAqBMJGOOYBbihV0lXI";

	//class constructor
	public function tweet_API() {
		$this->connection = new TwitterOAuth($this->consumer_key,$this->consumer_secret,$this->access_token,$this->access_token_secret);
		$this->connection->setTimeouts(10, 25);
	}

	public function search_by_hashtag($tag="#custserv")
	{
		//result_type can be popular, mixed OR recent(default)
		//add string to 'q' - " since:2016-10-1 until:2016-10-19"
		$query = array(
		  "q" => $tag,
		  "result_type" => "popular",
		  "count" => "100"
		);
		
		$content = $this->connection->get('search/tweets', $query);
		$tweets=array();
		foreach ($content->statuses as $result) {
			if($result->retweet_count > 0){
				//echo $result->user->screen_name;
				$tweets[]=array("user_name"=>$result->user->screen_name,"text"=>$result->text,"retweets"=>$result->retweet_count);
			}
		}
		return $tweets;
	}
}