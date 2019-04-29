<?php
include "Stack.php";
class Util{

    /**
     * Taking Integer value as User Input
     * Validating Integer value
     */
    public static function user_integerInput(){
        fscanf(STDIN,"%d\n",$number);
        if(filter_var($number,FILTER_VALIDATE_INT)){
            return $number;
        }
        else{
            echo "Invalid Input!\n";
            return Util::user_integerInput();
        }
    }

    /**
     * Taking Float value as User Input
     * Validating Foat value
     */
    public static function user_floatInput(){
        fscanf(STDIN,"%f\n",$number);
        if(filter_var($number,FILTER_VALIDATE_FLOAT)){
            return $number;
        }
        else{
            echo "Invalid Input!\n";
            return Util::user_floatInput();
        }
    }

    /**
     * Taking String as User Input
     * Validating String
     */
    public static function string_input()
    {
        fscanf(STDIN,"%s\n",$string);
        while(!(strlen($string)>0) || (is_numeric($string) || ($string==null))){
            echo "Enter the Valid String:\n";
            $string=Util::string_input();
        }
        return $string;
    }

    /**
     * Method for Checking is Arithmetic Expression is balanced or not
     */
    public function isBalanced($strLength,$expression)
    {
        $character1=0;$character2=0;$result=0;
        $top = -1;
        $stackArray = null;
        $stack = new Stack();
        for($i=0;$i<$strLength-1;$i++){
            
            if($expression[$i]=="("){
                $stack->push($expression[$i]);   
            }else if($expression[$i]==")"){
                $character2 = $expression[$i];
                $character1 = $stackArray[$top]; 
                $stack->pop();
            }
            
            if($character1 == '(' && $character2 == ')'){
                $result =1;
            }
            else{
                $result = 0;
            }
       }
       if($result==1 && $stack->isEmpty()){
           return true;
       }
       else{
           return false;
       }
    }

    /**
     * Method For Checking is number is prime number or not.
     */
    public static function isPrime($number){
        
        $count = 0;
        for($j=1;$j<=$number;$j++){
            if($number%$j==0){
                $count++;
            }
        }
        if($count==2){
            return true;
        }else{
            return false;
        }
    
}
}
?>