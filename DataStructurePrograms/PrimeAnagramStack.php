<?php
/**
 * Problem Statement:
 * Add the Prime Numbers that are Anagram in the Range of 0 ­ 1000 in a Stack using
 * the Linked List and Print the Anagrams in the Reverse Order. Note no Collection
 * Library can be used.
 */
include "Util.php";
class Node1{
    public $data;
    public $nextPointer;
    public function __construct($data)
    {
        $this->data = $data;
        $this->nextpointer= null;
    }
}

class StackLL{
    public $top =null;
    

    //Pushing data into Stack
    public function push($data)
    {
        $tempNode = new Node1($data);
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
        if(StackLL::isEmpty()){
            return null;
        }
        else{
            return $this->top->data;
        }
    }

    public function pop()
    {
        if(StackLL::isEmpty()){
            echo "Stack UnderFlow\n";
        }
        else{
            $tempNode = $this->top->data;
            $this->top = $this->top->nextPointer;
            return $tempNode;
        }
    }
}
$prime = new StackLL();
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
    $prime->push($array1[$j]);
}

for($j1=0;$j1<count($array1)-1;$j1++){
    echo $prime->pop()." ";
}
echo "\n";

?>