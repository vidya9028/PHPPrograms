<?php
class SNode{
    public $data;
    public $nextPointer;
    public function __construct($data)
    {
        $this->data = $data;
        $this->nextpointer= null;
    }
}

class StackLinkedList{
    public $top =null;
    

    //Pushing data into Stack
    public function push($data)
    {
        $tempNode = new SNode($data);
        if($tempNode==null){
            echo "Stack OverFlow\n";
        }

        //Initialize data to tempnode data field
        $tempNode->data = $data;
        //put top reference to tempnode link
        $tempNode->nextPointer = $this->top;
        //update top referance
        $this->top = $tempNode;  
    }

    public function isEmpty()
    {
        if($this->top==null){
            return true;
        }
        else{
            return false;
        }
    }

    public function peek()
    {
        if(StackLinkedList::isEmpty()){
            return null;
        }
        else{
            return $this->top->data;
        }
    }

    public function pop()
    {
        if(StackLinkedList::isEmpty()){
            echo "Stack UnderFlow\n";
        }
        else{
            $tempNode = $this->top->data;
            $this->top = $this->top->nextPointer;
            return $tempNode;
        }
    }
}
?>