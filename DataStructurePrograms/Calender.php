<?php
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

    $calender = Util::twoDArrayforCalender();

    $firstDay = Util::dayOfWeek(1,$month,$year);

    $lastDay = Util::calulateTotalDays($month,$year);

    $calender = Util::arrayFill($firstDay,$calender,$lastDay);
    echo "\n";
    $arrayYear=null;
    echo "Month :".$monthArray[$month-1]."    Year : ".$year."\n";
    echo "\n";
    Util::displayCalender($calender);
}
Calender();
?>