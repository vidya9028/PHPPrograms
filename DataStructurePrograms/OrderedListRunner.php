<?php
include "Util.php";
include "OrderedList.php";
$myfile = fopen("TestingInt.txt","a+")or die ("could not open file");
$numbers = fread($myfile,filesize("TestingInt.txt"));
$array = explode(" ",$numbers);
$list =new OrderedList();
echo "File Elements to Array: ";
foreach($array as $arr){
    echo $arr." ";
}
for($i=0;$i<count($array);$i++){
    
    $list->add($array[$i]);
}
echo "\nWords Seperated From Linkedlist:\n";
$list->displayList();

echo "\nEnter the element you want to search:\n";
$key = Util::user_integerInput();
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
$key1 = Util::user_integerInput();
$list->remove($key1);
$list->displayList();
echo "\n";
echo $list->size();

?>