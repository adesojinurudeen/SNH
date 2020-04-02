<?php
//for arrays

$array_example=[]; //an empty array

$array_example_2=["gold"];

$array_example_3=["gold",3,"Orange", true];

//index=position of an element in the array
//position counts from 0

print $array_example_3[0]; //prints out gold
print $array_example_3[2]; //print out orange

print count($array_example_3); //print out 4

//print last element in an array
    $imaginary_array=[];

    print $array_example_3[count($array_example_3) -1];

    //if an array has 4 elements. then the highest index would be 3.

    print $array_example_3[0];

    $array_example_4=array();

    $array_example_4[0]="soji";
    $array_example_4[1]="ade";
    $array_example_4[2]="nuur";

    print $array_example_4;  // ("soji", "ade", "nuur")

?>