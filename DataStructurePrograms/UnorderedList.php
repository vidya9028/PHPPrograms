<?php
include "Node.php";
interface LinkedList{
    public function isEmpty();
    public function add($newData);
    public function remove($key);
    public function search($key);
    public function append($newData);
    public function displayList();
    public function size();
}

class UnorderedList implements LinkedList{
     
    public $head=null;
    public function isEmpty()
    {
        if($this->head==null)
            return true;
        return false;
    }
    //adding new data to linkedlist
    public function add($newData){
        $newNode = new Node($newData,null);
        $newNode->nextPointer = $this->head;
        $this->head = $newNode;
    }

    //removing data from linkedlist
    public function remove($key)
    {
        $tempNode =$this->head;
        $previousNode = null;

        //if head itself contains data which is to be deleted
        if($tempNode!=null && $tempNode->data==$key){
            $this->head = $tempNode->nextPointer;
            $tempNode = null;
            echo "Node Deleted Successfully!\n";
            return;
        }

        //if deleting element is not the first element
        while($tempNode!=null && $tempNode->data!=$key){
            $previousNode = $tempNode;
            $tempNode = $tempNode->nextPointer;
        }

        //if node is not present in the list
        if($tempNode==null){
            echo "Element Not Found\n";
            return;
        }

        $previousNode->nextPointer = $tempNode->nextPointer;
        $tempNode = null;
        echo "Node Deleted Successfully!\n";
        return;
    }

    //searching an element
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

    //adding data to the end of linked list
    public function append($newData)
    {
        $newNode = new Node($newData,null);

        /**
         * if linkedlist is empty
         * make head as new node
         * point nextpointer of new node to null
         */
        if($this->isEmpty()){
           $this->head = new Node($newData,null);
           echo "Element Added at the end successfully!\n"; 
           return;
        }
        $newNode->nextPointer = null;

        /**
         * if linkedlist contains elemnets
         * traverse linkedlist
         * point lastnode pointer to new node
         */
        $lastNode = $this->head;
        while($lastNode->nextPointer!=null){
            $lastNode = $lastNode->nextPointer;
        }
        $lastNode->nextPointer = $newNode;
        echo "Element Added at the end successfully!\n";
        return;
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