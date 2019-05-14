<?php
require_once "Image.php";
require_once "RealImage.php";
//class to implements interface Image
class ProxyImage implements Image{
    private $realImage;
    private $fileName;

    public function __construct($fileName){
        $this->fileName = $fileName;
        $this->realImage = null;
    }

    public function display(){
        if($this->realImage==null){
            $this->realImage = new RealImage($this->fileName);
        }
        $this->realImage->display();
    }
}
?>