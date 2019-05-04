<?php
include "Util.php";
$file = "InventoryDataManagement.json";

/**
 * getting decoded values from json file
 * as an associative array 
 */ 
$decodedData = Util::readJsonFile($file);

echo "Displaying values of Inventory Data:\n\n";
Util::inventoryData($decodedData);

//encoding into json format
echo "\nJson String is: ";
echo Util::json_String($decodedData);
echo "\n";
?>