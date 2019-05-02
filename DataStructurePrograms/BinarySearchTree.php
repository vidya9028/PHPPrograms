<?php
/**
 * Problem Statement:
 * Find how many binary search trees can be possible 
 * from given number of nodes
 * take user input for number of nodes
 */
include "Util.php";

echo "Enter the Number: ";
$number = Util::user_integerInput();

/**
 * Calculating number of binary search tress using formula
 * BST = 2n!/(n+1!)*n!
 */
$factorialOfNumerator = Util::factorialOfNumber(2*$number);
$factorialOfDenominarator = Util::factorialOfNumber($number+1) * Util::factorialOfNumber($number);

$noOfBinarySearchTree = floor($factorialOfNumerator/$factorialOfDenominarator); 
echo "Number of Possible Binary Search trees: ".$noOfBinarySearchTree;
echo "\n";
?>