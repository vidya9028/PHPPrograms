<?php
include "AnnotationExample.php";

//child class which inherits properties of parent class
class AnnotationChild extends AnnotationExample{
    /** 
     * @override
     */
    public function display(){
        echo "In Child Class\n";
    }
}

$obj = new AnnotationChild();
$obj->display();
$obj1 = new AnnotationExample();
$obj1->display();
?>