<?php
class BookSingletone{

    private $bookAuthor = 'Gamma, Helm, Johnson, and Vlissides';
    private $bookTitle = "Design Patterns";

    //private static data members
    private static $book = null;
    private static $isLoanedout = false;

    /**
     * private constructor will restrict
     * to other classes to create new object
     */
    private function __construct(){

    } 

    /**
     * Public static method to give global access to static object
     * returns instance to caller
     */
    public static function borrowBook(){
        if(self::$isLoanedout == false){
            if(self::$book == null){
                self::$book = new BookSingletone();
            }
        self::$isLoanedout = true;
        return self::$book;
        }
        else{
            return null;
        }
    }

    public function returnBook(BookSingletone $bookReturned){
        self::$isLoanedout = false;
    }
    
    //getter function to get book author name
    public function getBookAuthor(){
        return $this->bookAuthor;
    }

    //getter function to get book title name
    public function getBookTitle(){
        return $this->bookTitle;
    }

    //function to print book with author name;
    public function getAuthorAndTitle(){
        echo $this->getBookTitle()." by ".$this->getBookAuthor();
    }
}
?>