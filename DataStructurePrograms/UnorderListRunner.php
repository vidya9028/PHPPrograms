<?php
/**
 * Problem Statement:
 * Read from file the list of Words and take user input to search a Text
 * Take a user input to search a Word in the List. If the Word is not found then add it
 * to the list, and if it found then remove the word from the List. In the end save the
 * list into a file
 */
include "Util.php";
include "UnorderedList.php";
$myfile = fopen("Testing.txt","r")or die ("could not open file");
$string = fread($myfile,filesize("Testing.txt"));
$array = explode(" ",$string);
$list =new UnorderedList();
echo "File Elements to Array: ";
foreach($array as $arr){
    echo $arr." ";
}
for($i=0;$i<count($array);$i++){
    $list->add($array[$i]);
}
echo "\nWords Seperated From File:\n";
$list->displayList();

echo "\nEnter the element you want to search:\n";
$key = Util::string_input();
if($list->search($key)){
    echo "\nElement Found and Deleting...\n";
    $list->remove($key);
    $list->displayList();
}else{
    echo "\nElement not found ...Adding Element to the list...\n";
    $list->add($key);
    echo "\nElement Added Successfully!\n";
    $list->displayList();
}

echo "\nEnter the Element that you want to delete:\n";
$key = Util::string_input();
$list->remove($key);
$list->displayList();

echo "\nEnter the Element that you want to append:\n";
$key = Util::string_input();
$list->append($key);
$list->displayList();

echo "\n";
echo $list->size();

?>