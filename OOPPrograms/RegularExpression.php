<?php
/**
 * Problem Statement:
 * Read in the following message: Hello <<name>>, We have your full
 * name as <<full name>> in our system. your contact number is 91­xxxxxxxxxx.
 * Please,let us know in case of any clarification Thank you BridgeLabz 01/01/2016.
 * Use Regex to replace name, full name, Mobile#, and Date with proper value.
 * Print the Modified Message.
 */
include "Util.php";

$file = "RegularExpression.json";
$string = Util::readJsonFile($file);

$string = $string["string"];
echo "\n";
echo "Displaying the Json File Message:\n\n";
echo $string."\n\n";

echo "Enter the First Name: ";
$firstName = Util::string_input();

$string = preg_replace('/<{2}\w+>{2}/',$firstName,$string);

echo "Enter the Full Name: ";
$fullName = Util::string_input();
$string = preg_replace('/<{2}\w+\s\w+>{2}/',$fullName,$string);

$date = date("d/m/y");
$string = preg_replace('/\d{2}.\d{2}.\d{4}/',$date,$string);

echo "Enter The phone Number: ";
$mobileNumber = Util::inputMobileNumber();
$string = preg_replace('/\d{2}-\D{12}/',$mobileNumber,$string);

echo "\n";
echo "Modified Message is:\n".$string."\n";

?>