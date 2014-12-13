<?php
/**
 * Crumb class
 * for crumb management
 * @version 1.0 01/18/2011
 * @author Ceven <likailin1986@gmail.com>
 */
final class Crumb{
    /**
     * variable to record the crumb information
     */
    private $latitude = array();
    
    /**
     * function to get the single object of class Crumb
     * @return Crumb the object of class Crumb
     */
    static function getCrumb(){
        $session = Session::start();
        if(!$session->crumb instanceof Crumb){
            $session->crumb = new Crumb;
        }
        return $session->crumb;
    }
    
    /**
     * function to record new site information
     * @param string $title the title to be presented in the page
     * @param string $URL the url link to
     * @param boolean $readonly true on cannot be clicked
     */
    private function pushLatitude($title , $URL=null , $readonly=false){
        $crumb = array(
                "title" => $title,
                "URL" => $URL,
                "readonly" => $readonly,
            );
        array_push($this->latitude , $crumb);
    }
    
    /**
     * function to remove site information that is out of use
     * @param string $title the title that has been clicked
     */
    private function popLatitudeToTitle($title){
        $existTitle = false;
        foreach($this->latitude as $crumb){
            if($crumb['title'] == $title){
                $existTitle = true;
                break;
            }
        }
        if($existTitle == true){
            while(true){
                $crumb = array_pop($this->latitude);
                if($crumb['title'] == $title)
                    break;
            }
        }
    }
    
    /**
     * function to remove all latitude
     */
    public function popAllLatitude(){
        unset($this->latitude);
        $this->latitude = array();
    }
    
    /**
     * function to load crumb information
     * @param string $separator the separate symbol
     * @return string the information presented as a crumb
     */
    public function loadCrumbs($separator = " > "){
        $crumbStr = "";
        foreach($this->latitude as $crumb){
            $item = ($crumb['URL'] == null || $crumb['readonly'])?$crumb['title']:"<a href=\"".$crumb['URL']."\" >".$crumb['title']."</a>";
            $crumbStr = ($crumbStr == "")?$item:$crumbStr.$separator.$item;
        }
        return $crumbStr;
    }
    
    /**
     * function to record visit a new page
     * @param string $title the title to be presented in the page
     * @param string $URL the url link to
     * @param boolean $readonly true on cannot be clicked
     */
    public function visitNewPage($title , $URL=null , $readonly=false){
       $this->popLatitudeToTitle($title);
       $this->pushLatitude($title , $URL , $readonly);
    }
}