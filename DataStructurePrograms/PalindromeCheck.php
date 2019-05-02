<?php
/**
 * Problem Statement:
 * Take a String as an Input
 * The solution to this problem will use a deque to store the characters of
 * the string. We will process the string from left to right and add each character to
 * the rear of the deque.
 * True or False to Show if the String is Palindrome or not.
 */
include "Util.php";
include "Deque.php";

//taking string from user
echo "Enter The String: ";
$string = Util::string_input();
$string1 = "";
$deque = new Deque();

//inserting string into deque from rear
for($i=0;$i<strlen($string);$i++){
    $deque->insertAtRear($string[$i]);
}

//removing string from rear and storing it in another string
for($i=0;$i<strlen($string);$i++){
    $string1 = $string1.($deque->deleteRear());
}

//comparing strings if equal true,else false
if(strcasecmp($string,$string1)==0){
    echo "String is Palindrome!\n";
}
else{
    echo "String is Not Palindrome!\n";
}
?>