<?php
include "Person.php";

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

    public static function read_jsonFile($file)
    {
        return json_decode(file_get_contents($file));
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
    public static function validateMobileNumber()
    {
        $number = readline(" ");
        while(!(preg_match('/^[0-9]{2}-[0-9]{10}$/',$number))){
            echo "Invalid Input! Please Enter Valid Number: ";
            $number = Util::validateMobileNumber();
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

    /**
     * Method for Entering Moblie Number
     * Number Validation
     */
    public static function inputMobileNumber()
    {
        $mobileNumber = readline(" ");
        while(!(preg_match('/[0-9]{10}$/',$mobileNumber))){
            echo "Invalid Input! Please Enter Valid Number: ";
            $mobileNumber = Util::inputMobileNumber();
        }
        return $mobileNumber;
    }
    /**
     * Method for adding person details in addressbook
     */
    public static function addPerson(&$addressBook)
    {
        $person = new Person();

        echo "\nEnter the First Name: ";
        $person->firstName = Util::string_input();

        echo "\nEnter the Last Name: ";
        $person->lastName = Util::string_input();

        echo "\nEnter the Address: ";
        $person->address = Util::string_input();

        echo "\nEnter the City: ";
        $person->city = Util::string_input();

        echo "\nEnter the State: ";
        $person->state = Util::string_input();

        echo "\nEnter the ZipCode: ";
        $person->zipCode = Util::user_integerInput();

        echo "\nEnter the Mobile Number: ";
        $person->mobileNumber = Util::inputMobileNumber();

        $addressBook[] = $person;
        return $addressBook;
    }

    /**
     * Method for Edit data of persons
     */
    public static function editData(&$person){
        echo "1.Change Address\n2.Change Mobile Number\nEnter Your Choice: ";
        $choice = Util::user_integerInput();
        
        switch($choice){
            case 1:
                echo "Enter the Address: ";
                $person->address = Util::string_input();

                echo "\nEnter the City: ";
                $person->city = Util::string_input();

                echo "\nEnter the State: ";
                $person->state = Util::string_input();

                echo "\nEnter the ZipCode: ";
                $person->zipCode = Util::user_integerInput();
                
                echo "Address Changed Successfully!\n";
                return $person;
                break;
            
            case 2:
                echo "Enter the Mobile Number: ";
                $person->mobileNumber = Util::inputMobileNumber();
                echo "Mobile Number Changed Successfully!\n";
                return $person;
                break;

            default:
                break;
        }
    }

    /**
     * Method for deleting person
     */
    public static function deletePerson(&$array)
    {
        $key = Util::searchPerson($array);
        if($key > -1){
            array_splice($array,$key,1);
            echo "Person Deleted Succesfully!\n";
        }
        else{
            echo "Person Not Found!\n";
        }
    }

    /**
     * Method for searching for a specific person
     * If found return index of person else -1
     */
    public static function searchPerson(&$array)
        {
            //taking first an last name to search
            echo "Enter the first Name: ";
            $fname = Util::string_input();
            echo "Enter the last Name: ";
            $lname = Util::string_input();
         
            for ($i = 0; $i < count($array); $i++) 
            {
                if ($array[$i]->firstName == $fname) 
                {
                    if ($array[$i]->lastName  == $lname) 
                    {
                        return $i;
                    }
                }
            }
            return -1;
        }
    
    /**
     * Method for Display address Book
     */
    public static function displayAddressBook($array)
    {
        
        foreach($array as $person){
            echo sprintf("%s %s\n%s\n%s, %s\nZipCode-%u\nMobile Number-%u\n\n",$person->firstName,$person->lastName,$person->address,$person->city,$person->state,$person->zipCode,$person->mobileNumber);
        }
    }

    /**
     * Method for sorting persons according lastname or Zipcode
     */
    public static function sortAddressBook(&$array,$prop)
    {
        for($i=1;$i<count($array);$i++){
            $j = $i-1;
            $temp = $array[$i];
            while($j>=0 && $array[$j]->{$prop} >= $temp->{$prop}){
                $array[$j+1] = $array[$j];
                $j--;
            }
            $array[$j+1] = $temp;
            
        }   
    }

    /**
     * Method for save data in json file
     */
    public static function save(&$addressBook)
    {
        file_put_contents("AddressBooklist.json",json_encode($addressBook));
    }

    
}
?>