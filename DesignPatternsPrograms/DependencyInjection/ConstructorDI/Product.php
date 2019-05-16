<?php
include "StockItem.php";

class Product{
    //private data members
    private $stockItem;
    private $name;

    /**
     * create constructor
     * @param $stockItem
     * @param $name
     */
    public function __construct(StockItem $stockItem, $name){
        $this->stockItem = $stockItem;
        $this->name = $name;
    }

    /**
     * @return $stockItem
     */
    public function getStockItem(){
        return $this->stockItem;
    }

    /**
     * @return Product Name
     */
    public function getName(){
        return $this->name;
    }

}
//creating object
$obj = new Product(new StockItem("Available",10),"Motorola");
print_r("ProductName:".$obj->getName());
echo "\n";
print_r($obj->getStockItem());
?>