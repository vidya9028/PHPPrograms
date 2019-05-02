<?php
//required file
include "Node.php";

interface LinkedList{
    public function isEmpty();
    public function add($newData);
    public function remove($key);
    public function search($key);
    public function displayList();
    public function size();
}

class OrderedList implements LinkedList{
    
    public $head=null;
    public function isEmpty()
    {
        if($this->head==null)
            return true;
        return false;
    }
    //adding node to linkedlist
    public function add($newData){
        $newNode = new Node($newData,null);
        $newNode->nextPointer = $this->head;
        $this->head = $newNode;
    }

    //removing node from linkedlist
    public function remove($key)
    {
        $tempNode =$this->head;
        $previousNode = null;

        //if head itself contains element which is to be deleted
        if($tempNode!=null && $tempNode->data==$key){
            $this->head = $tempNode->nextPointer;
            $tempNode = null;
            echo "Node Deleted Successfully!\n";
            return;
        }else{
            //element is not first element which is to be deleted
            while($tempNode!=null && $tempNode->data!=$key){
                $previousNode = $tempNode;
                $tempNode = $tempNode->nextPointer;
            }
    
            //If node not found
            if($tempNode==null){
                echo "Element Not Found\n";
                return;
            }
    
            $previousNode->nextPointer = $tempNode->nextPointer;
            $tempNode = null;
            echo "Node Deleted Successfully!\n";
            return;
        }
    }

    //searching element
    public function search($key)
    {
        $currentNode = $this->head;
        while($currentNode!=null){
            if($currentNode->data==$key){
                return true;
            }
            $currentNode = $currentNode->nextPointer;   
        }
        return false;
    }

    public function displayList()
    {
        $tempNode =$this->head;
        while($tempNode!=null){
            echo $tempNode->data." ";
            $tempNode = $tempNode->nextPointer;
        }
    }

    public function size()
    {
        $tempNode = $this->head;
        $count =0;
        while($tempNode!=null){
            $tempNode = $tempNode->nextPointer;
            $count++;
        }
        echo "Size of linked list is: ".$count;
    }
}
?>