<?php
//Stock class stock details.Encapsulated class.
class Stock{
    private $stockName;
    private $noOfShares;
    private $price;

    //constructor
    public function __construct($stockname,$numberofShares,$sharesPrice)
    {
        $this->stockName = $stockname;
        $this->noOfShares = $numberofShares;
        $this->price = $sharesPrice;
    }

    //getter method for Stockname
    public function getStockName()
    {
        return $this->stockName;
    }

    //getter method for Number of shares
    public function getNoOfShares()
    {
        return $this->noOfShares;
    }

    //getter method for price of shares
    public function getPrice()
    {
        return $this->price;
    }

    //method for calculating Stock values
    public function stockValue()
    {
        return ($this->getNoOfShares()*$this->getPrice());
    }
}
?>