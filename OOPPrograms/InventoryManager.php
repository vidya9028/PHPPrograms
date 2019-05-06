<?php
/**
 * Problem Statement:
 * program to Create InventoryManager to manage the
 * Inventory. The Inventory Manager will use InventoryFactory to create Inventory
 * Object from JSON. The InventoryManager will call each Inventory Object in its list
 * to calculate the Inventory Price and then call the Inventory Object to return the
 * JSON String. The main program will be with InventoryManager
 */
require_once "Util.php";
include "InventoryFactory.php";
class InventoryManager{
    public $list = null;
    //constructor
    public function __construct()
    {
        $this->list = null;
    }

    public function inventory(){
        //creating object of inventoryfactory class
        $inventories = new InventoryFactory();

        //calling setinventory function for reading values from json file
        $inventories->setInventory();

        //calling getinventory funtion for retriving data
        $this->list = $inventories->getInventory();
        $array = $this->list;

        //calling function for calculating inventory values
        $inventories->inventoryValue($array);

        //calling function for retriving json string
        $jsonString = Util::json_String($this->list);
        echo "JSON String:\n".$jsonString."\n";
    }
}

$imanager = new InventoryManager();
$imanager->inventory();
?>