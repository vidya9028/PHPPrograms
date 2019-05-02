<?php
/**
 * Problem Statement:
 * Write a program Calendar.php that takes the month and year as command­line
 * arguments and prints the Calendar of the month. Store the Calendar in an 2D Array,
 * the first dimension the week of the month and the second dimension stores the day
 * of the week. Print the result as following.
 */
include "Util.php";

function Calender()
{
    echo "Enter Year: ";
    $year = Util::user_integerInput();
    if($year<1000||$year>9999){
        echo "Please Enter Year between 1000 to 9999: ";
        $year = Util::user_integerInput();
    }

    echo "\nEnter the Month between 1 to 12: ";
    $month = Util::user_integerInput();
    if($month>12){
        echo "Enter Correct month-- ";
        $month = Util::user_integerInput();
    }

    //Array for storing months
    $monthArray = array("JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");

    //initializing calender in 2d array with default values
    $calender = Util::twoDArrayforCalender();

    //calculating firstday of week
    $firstDay = Util::dayOfWeek(1,$month,$year);

    //calculating total days of a month
    $lastDay = Util::calulateTotalDays($month,$year);

    //filling data into array
    $calender = Util::arrayFill($firstDay,$calender,$lastDay);
    echo "\n";
    $arrayYear=null;
    echo "Month :".$monthArray[$month-1]."    Year : ".$year."\n";
    echo "\n";
    Util::displayCalender($calender);
}
Calender();
?>