<?php
class Stack{
    public static $max = 100;
    public $top = -1;
    public $stackArray=null;

    public function __construct(){
        $this->top = -1;
        $this->stackArray = new SplFixedArray(Stack::$max-1);
    }
    //checking stack is empty or not
    public function isEmpty()
    {
        if($this->top=-1){
            return true;
        }else
        {
            return false;
        }
    }

    /**
     * pushing data into stack
     * first check stack is full or not
     * push data into stack
     */
    public function push($newData){
    
        if($this->top>(Stack::$max-1)){
        echo "Stack Overflow!";
        return false;
        }
        else{
            $this->top++;
            $stackArray[$this->top] = $newData;
            return true;
        }
    }

    /**
     * pop data from stack
     * first check stack is empty or not
     * pop
     */
    public function pop()
    {
        if($this->top<0){
            echo "Stack is UnderFlow!\n";
            return false;
        }
        else{
            $this->stackArray[$this->top--];
        }
    }
}
?>