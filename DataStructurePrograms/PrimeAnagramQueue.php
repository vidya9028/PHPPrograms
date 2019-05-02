<?php
/**
 * Problem Statement:
 * Add the Prime Numbers that are Anagram in the Range of 0 ­ 1000 in a Queue using
 * the Linked List and Print the Anagrams from the Queue. Note no Collection Library
 * can be used.
 */
include "Util.php";
class QNode1{
    public $data;
    public $nextPointer;
    public function __construct($data)
    {
        $this->data = $data;
        $this->nextpointer= null;
    }
}

class QueueLL{

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
        $tempNode = new QNode1($data);

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

    public function displayList(){
        $tempNode = $this->front;
        while($tempNode!=null){
            echo $tempNode->data." ";
            $tempNode = $tempNode->nextPointer;
        }
        echo "\n";
    }
}

$prime = new QueueLL();
$array[]=null;
$array1[]=null;
$number=1;
for($i=0;$i<168;){
    if(Util::isPrime($number)){
        $array[$i]=$number;
         $i++;   
        }
        $number++;
}

$array1=Util::isAnagram($array);

for($j=0;$j<count($array1)-1;$j++){
    $prime->enqueue($array1[$j]);
}
echo "\n";
$prime->displayList();
?>