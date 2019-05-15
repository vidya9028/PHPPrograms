<?php
require_once "Visitor.php";
require_once "Visitee.php";
require_once "PlainDescription.php";
require_once "FancyDescription.php";

$book = new BookVisitee("Design Patterns", "Gamma, Helm, Johnson, and Vlissides");
$software = new SoftwareVisitee("Zend Studio", "Zend Technologies", "www.zend.com");

$plainVisitor = new PlainDescription();
acceptVisitor($book,$plainVisitor);
echo "\nPlain Description of Book: ".$plainVisitor->getDescription();

acceptVisitor($software,$plainVisitor);
echo "\nPlain Description of Software: ".$plainVisitor->getDescription();
echo "\n";
$fancyVisitor = new FancyDescription();
acceptVisitor($book,$fancyVisitor);
echo "\nFancy Description of Book: ".$fancyVisitor->getDescription();

acceptVisitor($software,$fancyVisitor);
echo "\nFancy Description of Software: ".$fancyVisitor->getDescription();
echo "\n";
function acceptVisitor(Visitee $visiteeIn, Visitor $visitorIn){
    $visiteeIn->accept($visitorIn);
}
?>