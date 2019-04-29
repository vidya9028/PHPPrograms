<?php

class BankingQueue{
    public $array = array();
    public $front = 0;
    public $rear = 0;

    public function __construct()
    {
        $this->front = 0;
        $this->rear = 0;
    }
    public function isEmpty(){
        if($this->front==$this->rear){
            return true; 
        }
        else{
            return false;
        }
    }

    public function isFull(){
        if($this->rear==9){
            return true;
        }
        else{
            return false;
        }
    }

    public function enqueue($data){
        if(BankingQueue::isFull()){
            echo "Queue OverFlow";
        }else{
            $array[$this->rear] = $data;
            $this->rear++;
        }
    }

    function dequeue(){
        if(BankingQueue::isEmpty()){
            echo "Queue UnderFlow";
        }else{
            $this->front++;
        }
    }

    public function displayQueue(){
        if(BankingQueue::isEmpty()){
            echo "Queue UnderFlow";
        }else{
            for($i=$this->front;$i<$this->rear;$i++){
                echo $array[$i];
            }
        }
    }
}
?>