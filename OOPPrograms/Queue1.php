<?php 

  class Node1{
    public $value;
    public $next;
    public function __construct()
    {
      $value = null;
      $next = null;
    }
  }
  
  class Queue
  { 
    public $front = null;
    public $back = null;
    public $size = null; 

    public function __construct()
    {
          $this->front = null;
          $this->back = null;
          $this->size = null;
    }

    public function isEmpty()
    {
      return $this->front == null;
    }
    
    public function enqueue($value)
    {
      $oldback = $this->back;
      //last pointing to new node
      $this->back = new Node1(); 
      $this->back->value = $value;
      if($this->isEmpty())
      {
        //if empty both first and last point to the new node
        $this->front = $this->back;
        $this->size++; 
      }
      else
      {
        //else last point to new node
        $oldback->next = $this->back;
        $this->size++; 
      }
    }
    
    public function dequeue()
    {
      if($this->isEmpty())
      {
        echo "the queue is empty\n";
        return null; 
      }
      //removing first value and modifying queue 
      $removedValue = $this->front->value;
      $this->front = $this->front->next;
      $this->size--;
      return $removedValue;
    }

    public function size()
    {
      return $this->size;
    }
    
  }
?>