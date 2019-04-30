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

     /**
      * Method for get starting day of month
      */
    public static function dayOfWeek($day, $month, $year)
    {
        $year1 = floor($year - (14 - $month) / 12) + 1;
        $leap = floor($year1 + floor($year1/4) - floor($year1/100) + floor($year1/400));
        $month1 = ($month +12 * floor(((14 - $month) / 12)) - 2 );
        $day1 = floor(($day + $leap +floor(( 31 * $month1) / 12)) % 7 );
        return $day1;
    }

    /**
     * Method for to check leap year
     * It returns boolean value
     */
    public function leapYear($year)
    {
        if($year%400==0 || $year%4==0){
            return true;
        }
        else if($year%100==0){
            return false;
        }
        else{
            return false;
        }
    }


    /**
     * Method to print the 2d array as a calender
     */
    Public static function displayCalender($array)
    {
        echo "Sun   Mon   Tue   Wed   Thu   Fri   Sat\n";
        for ($i = 0; $i < 6; $i++) 
        {
            for ($j = 0; $j < 7; $j++) 
            {
                if ($array[$i][$j] == '-' || $array[$i][$j] > 31) 
                {
                    //replacing with spaces
                    echo "      ";
                } 
                else 
                {
                    if ($array[$i][$j] < 10) 
                    {
                        //giving 5 space after single digit
                        echo $array[$i][$j] . "     ";
                    } 
                    else 
                    {
                        //giving 4 space after two digit number
                        echo $array[$i][$j] . "    ";
                    }
                }
            }
            echo "\n";
        }
    }

    /**
     * Method for values in Calender
     */
    public function arrayFill($firstDay, $array, $lastDay)
    {
        //taking count variable to fill the array
        $count = 1;
        for ($i = $firstDay; $i < 7; $i++) 
        {
            //filling first line
            $array[0][$i] = $count++;
        }
        for ($i = 1; $i < 6; $i++) 
        {
            //filling remaining lines
            for ($j = 0; $j < 7 && $count <= $lastDay; $j++) 
            {
                $array[$i][$j] = $count++;
            }
        }
        return $array;
    }

    /**
     * Method for 2D array with default values
     */
    public static function twoDArrayforCalender()
    {
        $array = [];
        for ($i = 0; $i < 6; $i++) 
        {
            $array1 = array();
            for ($j = 0; $j < 7; $j++) 
            {
                //initializing array values to '-'
                $array1[$j] = '-';
            }
            //pushing array to each row of 2d array
            array_push($array, $array1);
        }
        return $array;
    }

    /**
    * Function to calculate the end of the month or no of days in the month
    */
    public function calulateTotalDays($month, $year)
    {
        if ($month < 8) {
            if ($month % 2 == 0) {
                if ($month == 2) {
                    if (Util::leapYear($year)) {
                        return 29;
                    }
                    return 28;
                }
                return 30;
            } else {
            return 31;
            }
        } else {
            if ($month % 2 == 0) {
            return 31;
        }
        return 30;
        }
    }

}
?>