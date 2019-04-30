<?php
include "Util.php";
include "Deque.php";

echo "Enter The String: ";
$string = Util::string_input();
$string1 = "";
$deque = new Deque();

for($i=0;$i<strlen($string);$i++){
    $deque->insertAtRear($string[$i]);
}

for($i=0;$i<strlen($string);$i++){
    $string1 = $string1.($deque->deleteRear());
}

if(strcasecmp($string,$string1)==0){
    echo "String is Palindrome!\n";
}
else{
    echo "String is Not Palindrome!\n";
}
?>