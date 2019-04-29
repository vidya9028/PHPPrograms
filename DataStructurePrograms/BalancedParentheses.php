<?php
/**
 * Problem stmt:
 *  read in Arithmetic Expression such as (5+6)∗(7+8)/(4+3)(5+6)∗(7+8)/(4+3)
 *  Write a Stack Class to push open parenthesis “(“ and pop closed
 *  parenthesis “)”. At the End of the Expression if the Stack is Empty then
 * check if Arithmetic Expression is Balancedor not.
 */
include "Util.php";
echo "Enter the Expression:\n";
$expression = Util::string_input();
$strLength = strlen($expression); 
if(Util::isBalanced($strLength,$expression)){
    echo "\nExpression is Balanced!\n";
}else{
    echo "\nExpression is Not Balanced!\n";
}
?>