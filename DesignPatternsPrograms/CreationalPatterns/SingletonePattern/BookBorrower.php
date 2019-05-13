<?php
require_once "BookSingletone.php";
class BookBorrower{

    private $borrowedBook = true;
    private $haveBook = false;

    public function __construct(){

    }

    public function getAuthorAndTitle(){

        if($this->haveBook == true){
            return $this->borrowedBook->getAuthorAndTitle();
        }
        else{
            echo "I don't have the book";
        }
    }
    
    public function borrowBook(){
        $this->borrowedBook = BookSingletone::borrowBook();
        if($this->borrowedBook == null){
            $this->haveBook = false;
        }
        else{
            $this->haveBook = true;
        }
    }

    public function returnBook(){
        $this->borrowedBook->returnBook($this->borrowedBook);
    }
}
?>