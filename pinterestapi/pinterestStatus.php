<?php


require 'vendor/autoload.php';

use DirkGroenen\Pinterest\Pinterest;

class pinterestStatus {   
    // Kpasapp pinterest app
    protected $_appID = "app id go here";
    protected $_appSecret = "app secret go here";
    protected $_accessToken = "acess token go here";
    
    public function postStatus ($status, $county, $lang) {

        try {
            $pinterest = new Pinterest($this->_appID, $this->_appSecret);

            $pinterest->auth->setOAuthToken($this->_accessToken);
            
            // Set up the pin            
            $arrayPinterestPost = array(
                "link"           => $status['url'],
                "note"          => $status['description'],
            );
            
            if (isset($status['image'])) {
               $arrayPinterestPost['image_url'] = $status['image'];    
            } 
            
            
            
            /*
             * There are 7 boards
             * 
             * 1. "Baja California Sur Eventos": all es posts
             * 2. "Baja California Sur Events": all en posts
             * 3. "La Paz, BCS Eventos": all es posts from La Paz county
             * 4. "La Paz, BCS  events": all en posts from La Paz county
             * 5. "Los Cabos, BCS Eventos": all es posts from Los Cabos county
             * 6. "Los Cabos Events": all en posts from Los Cabos county
             * 
             * id La Paz = 2
             * id Los Cabos = 4
             * 
             */

            
            // 1. "Baja California Sur Eventos": all es posts
            if ($lang == "es") {            
                $arrayPinterestPost['board'] = "361765851256377677";
                $pinterest->pins->create($arrayPinterestPost);
            }

            // 2. "Baja California Sur Events": all en posts
            if ($lang == "en") {                
                $arrayPinterestPost['board'] = "361765851256520809";
                $pinterest->pins->create($arrayPinterestPost);    
            }
            
            // 3. "La Paz, BCS Eventos": all es posts from La Paz county
            if ($lang == "es" && $county == 2) {
                $arrayPinterestPost['board'] = "361765851256377680";
                $pinterest->pins->create($arrayPinterestPost); 
            }
            
            // 4. "La Paz, BCS  events": all en posts from La Paz county
            if ($lang == "en" && $county == 2) {
                $arrayPinterestPost['board'] = "361765851256520818";
                $pinterest->pins->create($arrayPinterestPost);
            }
            
            // 5. "Los Cabos, BCS Eventos": all es posts from Los Cabos county
            if ($lang == "es" && $county == 4) {
                $arrayPinterestPost['board'] = "361765851256377679";
                $pinterest->pins->create($arrayPinterestPost); 
            }
            
            // 6. "Los Cabos Events": all en posts from Los Cabos county
            if ($lang == "en" && $county == 4) {
                $arrayPinterestPost['board'] = "361765851256520810";
                $pinterest->pins->create($arrayPinterestPost);  
            }


        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }        

}