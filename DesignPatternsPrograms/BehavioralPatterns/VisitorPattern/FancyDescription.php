<?php
require_once "Visitor.php";
require_once "BookVisitee.php";
require_once "SoftwareVisitee.php";

//class to extends abstract class visitee
class FancyDescription extends Visitor{
    private $description =null;
    
    public function getDescription(){
        return $this->description;
    }

    public function setDescription($descriptionIn){
        $this->description = $descriptionIn;
    }

    public function visitBook(BookVisitee $bookVisit){
        $this->setDescription($bookVisit->getTitle().
        '...!*@*! written !*! by !@! '.$bookVisit->getAuthor());
    }
    function visitSoftware(SoftwareVisitee $softVisit) {
        $this->setDescription($softVisit->getTitle().
        '...!!! made !*! by !@@! '.$softVisit->getSoftwareCompany().
        '...www website !**! at http://'.$softVisit->getSoftwareCompanyURL());
    }
}

?>