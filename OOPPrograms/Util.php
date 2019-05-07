<?php
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
        $string = readline(" ");
        while(!(strlen($string)>0) || (is_numeric($string) || ($string==null))){
            echo "Enter the Valid String:\n";
            $string=Util::string_input();
        }
        return $string;
    }

    /**
     * Method for reading  json file as string
     */
    public Static function readJsonFile($file)
    {
        //taking json file contents as a String
        $string = file_get_contents($file);
        
        /**
         * values decoding from json file,
         * converting into an associative array
         */ 
        $jsondata = json_decode($string,true);

        return $jsondata;
    }

    /**
     * Method for displaying each value of inventoryDatamanagement
     */
    public static function inventoryData($decodedData)
    {
        $array = ["Rice","Pulse","Wheat"];

        for($i=0;$i<count($array);$i++){
            foreach($decodedData[$array[$i]] as $value){
                echo "The Price of ".$value["Name"]." for ".$value["Weight"]." KG is ".($value["Weight"]*$value["Price"])." Rs\n";
            }
            echo "\n";
        }
    }

    /**
     * Method for get the json string from inventory object
     */
    public static function json_String($decodedData)
    {
        $jsonString = json_encode($decodedData);
        return $jsonString;
    }

    /**
     * Method for Entering Moblie Number
     * Number Validation
     */
    public static function inputMobileNumber()
    {
        $number = readline(" ");
        while(!(preg_match('/^[0-9]{2}-[0-9]{10}$/',$number))){
            echo "Invalid Input! Please Enter Valid Number: ";
            $number = Util::inputMobileNumber();
        }
        return $number;
    }

    /**
     * Method for string sorting using
     * Insertion Sort
     */
    public static function insertionSort($array,$size)
    {
        for($i=1;$i<$size;$i++){
            $temp = $array[$i];
            for($j=$i-1;$j>=0 && (strcmp($array[$j],$temp))>0;$j--){
                $array[$j+1] = $array[$j];
            }
            $array[$j+1] = $temp;
        }
        return $array;
    }
}
?>