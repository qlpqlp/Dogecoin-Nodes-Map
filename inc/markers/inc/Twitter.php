<?php
/**
*   File: Twitter
*   Author: https://twitter.com/inevitable360 and all #Dogecoin friends and familly helped will try to find a way to put all names eheh!
*   Description: Real use case of the dogecoin.com CORE Wallet connected by RPC Calls using Old School PHP Coding with easy to learn steps (I hope lol)
*   License: Well, do what you want with this, be creative, you have the wheel, just reenvent and do it better! Do Only Good Everyday
*/

// We include the Twitter API
require_once('inc/vendors/TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$TwitterSettings = array(
    'oauth_access_token' => $TwitterAccessToken,
    'oauth_access_token_secret' => $TwitterAccessTokenSecret,
    'consumer_key' => $TwitterConsumerKey,
    'consumer_secret' => $TwitterConsumerSecret
);
$twitter = new TwitterAPIExchange($TwitterSettings);

    $i = 0;
    // now we send the request to get the all Tweets with the correct #hastag $TwitterSpecialTag
    $tweet = json_decode($twitter->setGetfield('query='.$TwitterSpecialTag.'&max_results=100&expansions=author_id&tweet.fields=created_at,referenced_tweets&place.fields=name&user.fields=username')->buildOauth('https://api.twitter.com/2/tweets/search/recent', 'GET')->performRequest());

    // we get the total of tweets and users found
    $total = count($tweet->data);
    $totalusers = count($tweet->includes->users);

                              // we go tru all user tweets to find the correct username
                              for ($iusers = 0; $iusers < $totalusers; $iusers++ ) {
                                  if ($tweet->includes->users[$iusers]->id == $tweet->data[$i]->author_id){
                                      $username = $tweet->includes->users[$iusers]->username;
                                  };
                              };
?>
<div class="col-12" id="slides">
    <div class="btn btn-primary slide showing" role="alert">
      <a href="https://twitter.com/<?php echo $username; ?>/status/<?php echo $tweet->data[$i]->id; ?>" target="_blank" style="color: rgba(255, 255, 255, 1); text-decoration: none">Use the hashtag #<?php echo $TwitterSpecialTag; ?> on <i class="fa fa-twitter-square" aria-hidden="true"></i> to show here <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="bg-light" style="color: #000000">@<?php echo $username; ?></span> <?php echo $tweet->data[$i]->text; ?></a>
    </div>
</div>
</div>