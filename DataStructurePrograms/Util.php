<?php
include "Stack.php";
include "Queue.php";
include "StackLinkedList.php";
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
    public static function isBalanced($strLength,$expression)
    {   
        $stack = new Stack();
        for($i=0;$i<$strLength;$i++){
            
            if($expression[$i]=="("){
                $stack->push($expression[$i]);   
            }else if($expression[$i]==")"){
                
                $stack->pop(); 
                
            }
       }
       if($stack->isEmpty()){
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
    public static function leapYear($year)
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
    public static function arrayFill($firstDay, $array, $lastDay)
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
    public static function calulateTotalDays($month, $year)
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
    
    /**
     * Method for printing calender using queue
     */

    public static function calenderQueue($totalDays,$firstDay)
    {
         //taking two queue one for weekdays and one for date
         $weekdaysQueue = new Queue();
         $dateQueue = new Queue();
         $array = array("Sun", "Mon", "Tue", "Wen", "Thu", "Fri", "sat");
         
         //storing days in weekdays queue
         for($i=0;$i<count($array);$i++)
         {
             $weekdaysQueue->enqueue($array[$i]);
         }
         //storing dates in date queue
         for( $i=1;$i<=$totalDays;$i++)
         {
             $dateQueue->enqueue($i);
         }
         //printing the days
         for($i=0;$i<count($array);$i++)
         {
             echo $weekdaysQueue->dequeue()."  ";
         }
         echo "\n";
         //printing space till the start date of calender 
         for ($i=0;$i<($firstDay*5);$i++)
         {
             echo " ";
         }
         //printing the dates according to row
         for($i=1;$i<=$totalDays;$i++)
         {
             if($i<10)
             {
                 echo(" ".$dateQueue->dequeue()."   ");
             }
             if($i>9)
             {
                 echo("".$dateQueue->dequeue()."   ");
             }
             if((($firstDay+$i)%7) ==0)
             {
                 echo " \n";
             }
         }
 
    }
    /**
     * Method for printing calender using stack
     */

    public static function calenderStack($totalDays,$firstDay)
    {
        
         //taking two stack one for weekdays and one for date
         $weekdaysStack = new StackLinkedList();
         $dateStack = new StackLinkedList();
         $array = array("Sun", "Mon", "Tue", "Wen", "Thu", "Fri", "sat");
         
         //storing days in weekdays Stack
         for($i=count($array);$i>=0;$i--)
         {
             $weekdaysStack->push($array[$i]);
         }
         //storing dates in date Stack
         for( $i=$totalDays;$i>=1;$i--)
         {
             $dateStack->push($i);
         }
         //printing the days
         for($i=0;$i<count($array);$i++)
         {
             echo $weekdaysStack->pop()."  ";
         }
         echo "\n";
         //printing space till the start date of calender 
         for ($i=0;$i<($firstDay*5);$i++)
         {
             echo " ";
         }
         //printing the dates according to row
         for($i=1;$i<=$totalDays;$i++)
         {
             if($i<10)
             {
                 echo(" ".$dateStack->pop()."    ");
             }
             if($i>9)
             {
                 echo("".$dateStack->pop()."      ");
             }
             if((($firstDay+$i)%7) ==0)
             {
                 echo " \n";
             }
         }
    }

    public static function isAnagram($array)
    {
        $length = count($array);
        $anagram = false;
        $anagramArray = [];
        $nonanagramArray = []; 
        for($i=0;$i<$length-1;$i++){
            for($j=0;$j<$length-1;$j++){
                if($i != $j){
                    $anagram = Util::checkAnagram($array[$i],$array[$j]);
                    if($anagram){
                       array_push($anagramArray,$array[$i]);
                       break;
                    }
                }
            }
        }
      return $anagramArray;
 
    }

    /**
     * Method for checking String is anagram or not
     */
    public static function checkAnagram($string1,$string2)
    {
        /**
         * count_chars($string, 1) returns an array with the ASCII value as key
         *  and number of occurrences as value, 
         * only lists occurrences greater than zero
         */
        if(count_chars($string1,1)==count_chars($string2,1)){
            return true;
        }
        else{
            return false;
        }

    }

    /**
     * Method for Calculating factorial of a number
     */
    public static function factorialOfNumber($number)
    {
        $factorial = 1;
        for($i=1;$i<=$number;$i++){
            $factorial = $factorial * $i;
        }
        return $factorial;
    }

}
?>