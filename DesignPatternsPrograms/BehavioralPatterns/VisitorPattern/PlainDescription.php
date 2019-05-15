<?php
require_once "Visitor.php";
require_once "BookVisitee.php";
require_once "SoftwareVisitee.php";
//class to extends abstract class Visitor
class PlainDescription extends Visitor{
    private $description = null;

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description_in){
        $this->description = $description_in;
    }
    public function visitBook(BookVisitee $bookVisit) {
        $this->setDescription($bookVisit->getTitle()." written by ".$bookVisit->getAuthor());
    }
    public function visitSoftware(SoftwareVisitee $softVisit) {
        $this->setDescription($softVisit->getTitle().
           " made by ".$softVisit->getSoftwareCompany().
           " website at ".$softVisit->getSoftwareCompanyURL());
    }
}
?>