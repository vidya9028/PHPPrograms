<?php
class QNode{
    public $data;
    public $nextPointer;
    public function __construct($data)
    {
        $this->data = $data;
        $this->nextpointer= null;
    }
}

class Queue{

    public $front;
    public $rear;

    public function __construct()
    {
        $this->front = null;
        $this->rear = null;
    }

    /**
     * Method for Insert data from rear
     */
    public function enqueue($data)
    {
        //Create new Node
        $tempNode = new QNode($data);

        /**
         * If queue is empty
         * make new node as front and rear
         */ 
        if($this->rear==null){
            $this->rear=$this->front=$tempNode;
        }

        /**
         * add new node at the end 
         * change rear
         */
        $this->rear->nextPointer = $tempNode;
        $this->rear = $tempNode;
    }

    /**
     * Method for Remove data from front
     */
    public function dequeue()
    {
        //check if queue is empty or not
        if($this->front==null){
            return null;
        }

        //store previous node and move front ahead
        $tempNode = $this->front->data;
        $this->front = $this->front->nextPointer;

        //if front becomes null, also make rear as null
        if($this->front==null)
            $this->rear=null;
        return $tempNode;
    }
}
?>