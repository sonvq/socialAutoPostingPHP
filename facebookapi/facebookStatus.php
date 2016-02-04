<?php

require_once 'vendor/autoload.php';

/* 
 * Example status
 */
//$status = [
//    'link' => 'http://kpasapp.com',
//    'message' => 'Visit kpasapp, Eventos Baja California Sur',
//];

class facebookStatus {

    // Kpasapp facebook app
    protected $_appID = "your app id";
    protected $_appSecret = "your app secret";
    
    // For bcs.kpasapp
    protected $_accessToken = "access token go here";
    
    // For master.kpasapp
    protected $_pageAccessToken = "page access token go here";
    
    protected $_defaultGraphVersion = "v2.5";
    
    public function postStatus($status) {
        $fb = new Facebook\Facebook([
            'app_id' => $this->_appID,
            'app_secret' => $this->_appSecret,
            'default_graph_version' => $this->_defaultGraphVersion,
        ]);
        

        try {
            // Post to https://www.facebook.com/bcs.kpasapp
            $response = $fb->post('/me/feed', $status, $this->_accessToken);
            
            // Post to https://www.facebook.com/master.kpasapp/
            $response2 = $fb->post('/633059556824338/feed', $status, $this->_pageAccessToken);
            
            // Post to https://www.facebook.com/groups/eventsbcs/
            $response3 = $fb->post('/723256584381647/feed', $status, $this->_accessToken);
            
            // Post to https://www.facebook.com/groups/1415807262056337/
            $response4 = $fb->post('/1415807262056337/feed', $status, $this->_accessToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
        }


    }

}