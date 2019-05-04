<?php
/**
 * Problem Statement:
 * Extend the Prime Number Program and store only the numbers in that range that are
 * Anagrams. For e.g. 17 and 71 are both Prime and Anagrams in the 0 to 1000 range.
 * Further store in a 2D Array the numbers that are Anagram and numbers that are not Anagram
 */
include "Util.php";

//Storing Prime Numbers in an array
$array[]=null;
$array1[]=null;
$number=1;
for($i=0;$i<168;){
    if(Util::isPrime($number)){
        $array[$i] = $number;
        $i++;
        }
        $number++;
}

//calling utilfunction to chechh number is angram or not
$array1=Util::isAnagram($array);

//storing anagrams numbers in twoD array
$number1=0;
$array2[17][17]=null;
for($j=0;$j<17;$j++){
    for($j2=0;$j2<17;$j2++)
    {
        if((count($array1))>$number1){
            $array2[$j][$j2]=$array1[$number1];
            $number1++;
        }
    }
}

//displaying 2D array
echo "\n Prime numbers Which are Anagrams :\n";
/*for($j=0;$j<count($array2)-1;$j++){
    for($j2=0;$j2<count($array2)-1;$j2++){
        if($array2[$j][$j2]!=null)
                echo $array2[$j][$j2]." ";
    }
    echo "\n";
}*/
foreach($array2 as $var){
    foreach($var as $var1){
        echo $var1." ";
    }
    echo " ";
    
}
echo "\n";

?>