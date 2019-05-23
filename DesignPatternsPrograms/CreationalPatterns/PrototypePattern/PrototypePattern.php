<?php
require_once "SubObject.php";
require_once "MyClonable.php";

$obj = new MyClonable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

echo "Original Object:\n";
echo "Number of object 1 instance variable: ".$obj->object1->instance;
echo "\nNumber of object 2 instance variable: ".$obj->object2->instance;

echo "\n\nCloned Object:\n";
echo "Number of object 1 instance variable: ".$obj2->object1->instance;
echo "\nNumber of object 2 instance variable: ".$obj2->object2->instance;
echo "\n";
?>