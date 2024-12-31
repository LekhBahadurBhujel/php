<?php
$year=2004;
if ($year % 400 == 0) {
    echo "$year is a leap year.";
 }
 
 else if ($year % 100 == 0) {
    echo "$year is not a leap year.";
 }
 
 else if ($year % 4 == 0) {
    echo "$year is a leap year.";
 }
 
 else {
    echo "$year is not a leap year.";
 }
?>