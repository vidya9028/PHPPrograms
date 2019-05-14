<?php
require_once "Image.php";
//class to implement interface image
class RealImage implements Image{
    private $fileName;
    public function __construct($fileName){
        $this->fileName = $fileName;
        RealImage::loadFromDisk($fileName);
    } 

    public function display(){
        echo "\nDisplaying Image: ".$this->fileName."\n";
    }

    private function loadFromDisk($fileName){
        echo "\nLoading file-- ".$this->fileName."\n";
    }
}
?>