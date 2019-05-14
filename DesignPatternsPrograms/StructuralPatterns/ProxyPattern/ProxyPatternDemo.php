<?php
require_once "ProxyImage.php";

$image = new ProxyImage("Image.png");
$image->display();
echo "\n";
$image->display();
?>