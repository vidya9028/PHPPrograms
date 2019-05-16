<?php
include "StockItem.php";

class Product{
    //private data members
    private $stockItem;
    private $name;

    /**
     * create constructor
     * @param $name
     */
    public function __construct($name){
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

    /**
     * set the value for stockItem
     * @param StockItem $stockItem
     * @return self
     */
    public function setStockItem(StockItem $stockItem){
        $this->stockItem = $stockItem;
        return $stockItem;
    }

}

$obj = new Product("Motorola");
echo "Product Name: ".$obj->getName()."\n";
$details = $obj->setStockItem(new StockItem("Available",10));
print_r($details);
echo "\n";
?>