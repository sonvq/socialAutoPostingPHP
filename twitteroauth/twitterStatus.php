<?php

require "autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

class twitterStatus {
    
    // Kpasapp twitter
    protected $_consumerKey = "app id go here";
    protected $_consumerSecret = "app secret go here";
    protected $_oauthToken = "oauth token go here";
    protected $_oauthSecret = "oauth secret go here";

    public function postStatus ($status) {
        try {
            $connection = new TwitterOAuth(
                    $this->_consumerKey, 
                    $this->_consumerSecret, 
                    $this->_oauthToken,
                    $this->_oauthSecret
            );
            $content = $connection->get('account/verify_credentials');
            $connection->post('statuses/update', array('status' => $status));
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}