<?php
require_once "BookSingletone.php";
require_once "BookBorrower.php";

echo "\n";

$bookBorrower1 = new BookBorrower();
$bookBorrower2 = new BookBorrower();

$bookBorrower1->borrowBook();
echo "Book Borrower1 asked to borrow a book: ";
echo "\nBook Borrower1 borrowed book: \n";
echo $bookBorrower1->getAuthorAndTitle();

$bookBorrower2->borrowBook();
echo "\n\nBook Borrower2 asked to borrow a book: ";
echo "\nBook Borrower2 borrowed book: \n";
echo $bookBorrower2->getAuthorAndTitle();

$bookBorrower1->returnBook();
echo "\n\nBook Borrower1 Returned the book!\n";

$bookBorrower2->borrowBook();
//echo "\n\nBook Borrower2 asked to borrow a book: ";
echo "\n\nBook Borrower2 borrowed book: \n";
echo $bookBorrower2->getAuthorAndTitle();
echo "\n";
?>