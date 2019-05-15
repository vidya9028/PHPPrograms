<?php
require_once "Visitee.php";
require_once "Visitor.php";
//class to extends abstract class Visitee
class BookVisitee extends Visitee{
    private $title;
    private $author;
    public function __construct($title,$author){
        $this->author = $author;
        $this->title = $title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getTitle(){
        return $this->title;
    }

    public function accept(Visitor $visitor){
        $visitor->visitBook($this);
    }
}
?>