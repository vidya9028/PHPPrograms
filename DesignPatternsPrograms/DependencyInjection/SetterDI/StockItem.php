<?php
class StockItem{
    //private data members
    private $status;
    private $quantity;

    /**
     * Create Constructor
     * @param $status
     * @param $quantity
     */

    public function __construct($status,$quantity){
        $this->status = $status;
        $this->quantity = $quantity;
    }

    /**
     * @return $status
     */
    public function getStatus(){
        return $this->status;
    }

    /**
     * @return $quantity
     */
    public function getQuantity(){
        return $this->quantity;
    }
}

?>