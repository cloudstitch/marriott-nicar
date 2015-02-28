<?
/*
	PLEASE WRITE YOUR KEYS BELOW.
*/
$CONSUMER_KEY = "PLEASE WRITE CONSUMER KEY";
$CONSUMER_SECRET = "PLEASE WRITE CONSUMER SECRET";
$ACCESS_TOKEN = "PLEASE WRITE ACCESS TOKEN";
$ACCESS_TOKEN_SECRET = "PLEASE WRITE  ACCESS TOKEN SECRET";


//We use already made Twitter OAuth library
//https://github.com/mynetx/codebird-php

require_once 'codebird.php';

if($CONSUMER_KEY != ''){
//Get authenticated
Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
$cb = Codebird::getInstance();
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);


//retrieve posts
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];

//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
//https://dev.twitter.com/docs/api/1.1/get/search/tweets
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => $count
);

//Make the REST call
$data123 = (array) $cb->$api($params);

//Output result in JSON, getting it ready for jQuery to process
echo json_encode($data123);
}
?>