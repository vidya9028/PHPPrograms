<?php
class Deque{
    public $front;
    public $rear;
    public $array;
    public static $size=0;
    public function __construct()
    {
        $this->front = -1;
        $this->rear = -1;
        $this->array = new SplFixedArray(10);
    }

    //checking queue is empty or not
    public function isEmpty()
    {
        if($this->front==-1 && $this->rear==-1){
            return true;
        }
        else{
            return false;
        }
    }

    //checking queue is full or not
    public function isFull()
    {
        if($this->rear==(count($this->array))){
            return true;
        }
        else{
            return false;
        }
    }

    public function insertAtRear($newData)
    {
        //If queue doesn't contains elements
        if($this->front== -1 && $this->rear== -1){
            $this->array[++$this->rear] = $newData;
            $this->front = $this->rear;
            self::$size++;
        }
        //If queue contains elements
        else{
            $this->rear = $this->rear+1;
            $this->array[$this->rear] = $newData;
            self::$size++;
        }
    }

    public function insertAtFront($newData)
    {
        //If queue doesn't contains elements
        if($this->front== -1 && $this->rear== -1){
            $this->front++;
            $this->array[$this->front] = $newData;
            $this->front = $this->rear;
            self::$size++;
        }
        //If queue contains elements
        else{
            $this->front =$this->front-1;
            $this->array[$this->front] = $newData;
            self::$size++;
        }
    }

    //deleting element from front end
    public function deleteFront()
    {
        //if queue has only one element
        if($this->front==$this->rear){
            $newData = $this->array[$this->front];
            $this->front = $this->rear = -1;
            self::$size--;
        }
        else{
            $newData = $this->array[$this->front];
            $this->front = $this->front+1;
            self::$size--;
        }
        return $newData;
    }

    //deleting element from rear end
    public function deleteRear()
    {
        //if queue has only one element
        if($this->rear == $this->front){
            $newData = $this->array[$this->rear];
            $this->rear = $this->front = -1;
            self::$size--;
        }
        else{
            $newData = $this->array[$this->rear];
            $this->rear = $this->rear-1;
            self::$size--;
        }
        return $newData;
    }

    public function size()
    {
        return $this->size;
    }
}

?>