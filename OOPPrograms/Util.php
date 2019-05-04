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
        fscanf(STDIN,"%s\n",$string);
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
    public function inventoryData($decodedData)
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
}
?>