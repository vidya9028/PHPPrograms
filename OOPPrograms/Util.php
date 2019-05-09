<?php
include "Person.php";
require_once "StockData.php";
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
        //taking json file contents as a String and storing it in a variable
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

    /**
     * Method for Buying stocks
     */
    public static function buyStocks($stockAccount)
    {
            $list = Util::printStockList();
    
            echo "Enter No with Stock To Buy : ";
            //var ch to store stock to buy
            $choice = Util::validateAmount(Util::user_integerInput(), 1, 8);
            echo $list[$choice-1]->stockName . " selected!\n";
            echo "Enter No Of Shares To Buy of " . $list[$choice-1]->stockName . " : ";
            //amount to store the no of shares to buy
            $amount = Util::validateAmount(Util::user_integerInput(), 0, $list[$choice-1]->noofShares);
            if($stockAccount[0]->AccountAmount<($list[$choice-1]->Price*$amount))
            {
                echo " Insufficient fund\n";
                return;
            }
            $list[$choice-1]->noofShares -= $amount;
            Util::saveList($list);
            //getting the stock from the list
            $stock = $list[$choice - 1];
            //creating new stock
            $stock = new StockData($stock->stockName, $stock->Price, $amount);
            //adding the stock to the account if already in the list and return
            $stockAccount[0]->AccountAmount-= $amount;
            for ($i = 1; $i < count($stockAccount); $i++) 
            {
                if ($stockAccount[$i]->stockName == $stock->stockName) 
                {
                    $stockAccount[$i]->noofShares += $stock->noofShares;
                    echo "Bought $stock->noofShares " . "$stock->stockName shares successfully";
                    Util::saveAccount($stockAccount);
                    return $stockAccount;
                }
            }
            //or else adds the new stack the end pf the list
            $stockAccount[] = $stock;
            echo "Bought $stock->noofShares " . "$stock->stockName shares successfully";
            //waiting for user to see the result
            Util::saveAccount($stockAccount);
            return $stockAccount;
    }

    /**
     * Method for Saving stock list
     */
    public static function saveList(&$list)
    {
        file_put_contents("StockList.json", json_encode($list));
    }

    /**
     * Method for validating amount entered by user
     * used for buying shares
     */
    public static function validateAmount($amount, $min, $max)
    {
        while (filter_var($amount, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) 
        {
            echo ("Variable value is not within the legal range\n");
            echo "enter again : ";
            $amount = Util::user_integerInput();
        }
        return $amount;
    }

    /**
     * Method for saving assount
     */
    public static function saveAccount($stockAccount)
    {
        file_put_contents("StockAccount.json", json_encode($stockAccount));
    }
    /**
     * Method for Printing Stock Report
     */
    public static function printStockList(int $s=0)
    {
        $list = json_decode(file_get_contents("StockList.json"));
            if($s===0)
            {
                echo "No | Stock Name | Share Price | Available\n";
                $i = 0;
                foreach ($list as $key) 
                {
                    echo sprintf("%-1u. | %-10s | Rs %-12u | %-9u", ++$i, $key->stockName, $key->Price , $key->noofShares) . "\n";
                }
            }
            return $list;
    }

    /**
     *Method for selling stocks 
     */
    public static function sellStocks($stockAccount)
        {
            
            Util::printAccount($stockAccount);
    
            echo "Enter No with Stock To Sell : ";
            //validating the input
            $ch = Util::validateAmount(Util::user_integerInput(), 1, count($stockAccount));
            echo $stockAccount[$ch]->stockName . " selected!\nEnter No Of Shares To Sell of " . $stockAccount[$ch]->stockName . " : ";
            $qt = Util::validateAmount(Util::user_integerInput(), 1, $stockAccount[$ch]->noofShares);
            //removing the stock
            $stockAccount[$ch]->noofShares -= $qt;
            $list = Util::printStockList(1);
            $list[$ch-1]->noofShares += $qt ;
            $stockAccount[0]->AccountAmount += ($qt*$list[$ch-1]->Price);
            Util::saveList($list);
            Util::saveAccount($stockAccount);
            echo "sold $qt shares successfully";
            //check if the shares are empty to delete the entry completely
            if ($stockAccount[$ch]->noofShares == 0) 
            {
                array_splice($stockAccount, ($ch), 1);
            }
            return $stockAccount;
        }
        //function to print the stock currently in the customer account
        public static function printAccount($stockAccount)
        {
            echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
            $i = 0;
            //looping over and printing the account details
            for ($i=1; $i < count($stockAccount) ; $i++) 
            {
                $key = $stockAccount[$i];
                echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", $i, $key->stockName, $key->Price, $key->noofShares, ($key->noofShares * $key->Price)) . "\n";
            }
        }
        /**
        * function to display the report of the stocks in account
        */
        public static function printStockreport($stockAccount)
        {
            $total = 0;
            echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
            //looping over and printing the account details and the account balance
            for ($i=1; $i < count($stockAccount) ; $i++) 
            {
                $key = $stockAccount[$i];
                echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->stockName, $key->Price, $key->noofShares, ($key->noofShares * $key->Price)) . "\n";
                $total += ($key->noofShares * $key->Price);
            }
            echo "\n";
            echo "Total Value Of Stocks is : " . $total . " rs\namount left in account : ".$stockAccount[0]->AccountAmount."\n\n";
        }    
}
?>