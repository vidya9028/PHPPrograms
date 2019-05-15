<?php
require_once "BookVisitee.php";
require_once "SoftwareVisitee.php";
//abstract class visit
abstract class Visitor{
    abstract function visitBook(BookVisitee $bookVisit);
    abstract function visitSoftware(SoftwareVisitee $softVisit);
}
?>