<?php
include "Util.php";

$firstNumber = 0;
$lastNumber =1000;
$array1[]=null;
//$array2[][]=null;
$number=1;
for($i=0;$i<168;){
    if(Util::isPrime($number)){
        $array1[$i] = $number;
        $i++;
        }
        $number++;
}

$number1=0;
$array2[10][17]=null;
for($j=0;$j<10;$j++){
    for($j2=0;$j2<17;$j2++)
    {
        if((count($array1))>$number1){
            $array2[$j][$j2]=$array1[$number1];
            $number1++;
        }
    }
}

for($j=0;$j<10;$j++){
    for($j2=0;$j2<17;$j2++){
        echo $array2[$j][$j2]." ";
    }
    echo "\n";
}

?>