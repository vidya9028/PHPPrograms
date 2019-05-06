<?php

class StockPortFolio{
    private $stocksArray = null;

    public function __construct()
    {
        $this->stocksArray = null;
    }

    //setter method for Stocks
    public function setStocks($stocksArray)
    {
        $this->stocksArray = $stocksArray;
    }
    
    //getter method for Stocks
    public function getStocks()
    {
        return $this->stocksArray;
    }

    //method for calculating total stock value
    public function totalStockValue()
    {
        $totalValue = 0;
        
        //calculating each stock value
        for($i=0;$i<count($this->stocksArray);$i++){
            $totalValue +=$this->stocksArray[$i]->stockValue();
        }
        return $totalValue;
    }
}
?>