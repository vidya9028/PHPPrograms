<?php
require ("Util.php");

echo "Enter the Month: ";
$month = Util::user_integerInput();

while ($month < 1 && $month > 12) {
    echo "Please Enter Correct Month: ";
    $month = Util::user_integerInput();
}
echo "Enter the Year: ";
$year = Util::user_integerInput();

while ($year < 1000 && $year > 9999) {
    echo "Please Enter Correct Year: ";
    $year = Util::user_integerInput();
}
//First starting day of the month
$firstDay = Util::dayOfWeek(1, $month, $year);
//total days of the month
$totalDays = Util::calulateTotalDays($month, $year);
//calling method to print calender using queue
Util::calenderStack($totalDays,$firstDay);
echo "\n";
?>