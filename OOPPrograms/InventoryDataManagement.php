<?php
/**
 * Problem Statement:
 * Create a JSON file having Inventory Details for Rice, Pulses and Wheats
 * with properties name, weight, price per kg..
 * Create the JSON from Inventory Object and output the JSON String
 */
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