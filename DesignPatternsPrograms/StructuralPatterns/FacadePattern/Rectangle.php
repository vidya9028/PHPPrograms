<?php
require_once "Shape.php";
//Rectangle class implementing Shape interface
class Rectangle implements Shape{
    public function draw(){
        echo "\nRectangle::Draw()\n";
    }
}
?>