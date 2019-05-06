<?php
include "Util.php";
require_once "Stock.php";
include "StockPortFolio.php";
$stocksArray = array();
$i=0;

echo "Enter the number of stocks: ";
$numberofStocks = Util::user_integerInput();

while($numberofStocks>0){
    echo "\nEnter the Stock name: ";
    $stockname = util::string_input();

    echo "\nEnter the Number of shares: ";
    $numberofShares = Util::user_integerInput();

    echo "\nEnter the Price: ";
    $sharesPrice = Util::user_integerInput();

    $stock = new Stock($stockname,$numberofShares,$sharesPrice);

    $stocksArray[$i++] = $stock;
    $numberofStocks--;
}

//creating stockPortfolio object
$stockPortfolio = new stockPortFolio();
$stockPortfolio->setStocks($stocksArray);
$array = $stockPortfolio->getStocks();
echo "\n";

for($i=0;$i<count($array);$i++){
    //printing each stock value
    echo "Total Value of ".$array[$i]->getStockName()." Stock is ".$array[$i]->stockValue()."\n";
}
echo "\n";
//printing total stock value
echo "Total Stock value is: ".$stockPortfolio->totalStockValue()."\n";
?>