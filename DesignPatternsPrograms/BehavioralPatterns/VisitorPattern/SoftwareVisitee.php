<?php
require_once "Visitee.php";
require_once "Visitor.php";
//class to extends abstract class visitee
class SoftwareVisitee extends Visitee{
    private $title;
    private $softwareCompany;
    private $softwareCompanyUrl;

    public function __construct($title,$softwareCompany,$softwareCompanyUrl){
        $this->title = $title;
        $this->softwareCompany = $softwareCompany;
        $this->softwareCompanyUrl = $softwareCompanyUrl;
    }

    public function getSoftwareCompany(){
        return $this->softwareCompany;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getSoftwareCompanyUrl(){
        return $this->softwareCompanyUrl;
    }

    public function accept(Visitor $visitor){
        $visitor->visitSoftware($this);
    }
}
?>