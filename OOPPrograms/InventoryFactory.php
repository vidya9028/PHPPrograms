<?php
require_once "Util.php";
class InventoryFactory{
    public $inventories = null;
    //constructor
    public function __construct()
    {
        $this->inventories = null;
    }

    //reading data from json file
    public function setInventory()
    {
        $file = "InventoryShare.json";
        $inventoryObject = Util::readJsonFile($file);
        $this->inventories = $inventoryObject;
    }

    //retriving data
    public function getInventory()
    {
        return $this->inventories;
    }

    /**
     * Method for calculating values for each inventory object
     */
    public static function inventoryValue($inventoryObject){
        $totalValue = 0;
        $array = ["Mobile","Tab","Laptop"];

        for($i=0;$i<count($array);$i++){
            echo "Inventory Details of ".$array[$i]." as Follows:\n";
            foreach($inventoryObject[$array[$i]] as $var){
                echo "The inventory Price of ".$var["Name"]." is ".($var["Quantity"]*$var["Price"])." Rs\n";
                $totalValue +=($var["Quantity"]*$var["Price"]);
            }
            echo "\n";
        }
        echo "Total Price of Inventory is: ".$totalValue." Rs\n\n";
    }
}
?>