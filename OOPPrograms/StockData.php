<?php
class StockData{
    public $stockName;
    public $noofShares;
    public $Price;

    public function __construct($stockName,$noofShares,$Price)
    {
       $this->stockName = $stockName;
       $this->noofShares = $noofShares;
       $this->Price = $Price;
    }
}
?>