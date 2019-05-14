<?php
require_once "Rectangle.php";
require_once "Circle.php";
//Facade class
class ShapeMakerFacadeClass{
    private $rectangle;
    private $circle;

    public function __construct(){
        $this->rectangle = new Rectangle();
        $this->circle = new Circle();
    }

    public function drawRectangle(){
        $this->rectangle->draw();
    }

    public function drawCircle(){
        $this->circle->draw();
    }

}
?>