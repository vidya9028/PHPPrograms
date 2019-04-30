<?php
class Node{
    public $data;
    public $nextPointer;
    public function __construct($data,$nextPointer)
    {
        $this->data = $data;
        $this->nextPointer = $nextPointer;
    }
}

?>