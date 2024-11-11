<?php

$num1 = 6;
$num2 = 9;
$num3 = 3;

if( $num1 > $num2 && $num1 > $num3 ) {
    echo "The ". $num1 . "is the largest number.<br>";
} 
elseif ($num2 > $num1 && $num2 > $num3 ) {
    echo "The ". $num2 . " is the largest number.<br>";
} 
elseif ($num3 > $num1 && $num3 > $num2 ) {
    echo "The ". $num3 . "is the largest number.<br>";
}

?>
