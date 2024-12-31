<?php
$num=222;
$reversed=0;
$original=$num;
while ($num!= 0) {
    $remainder = $num % 10;
    $reversed = $reversed * 10 + $remainder;
    $num=$num/10;
}
if($original==$reversed){
    echo "$original is palindrome number";
}
else
echo "$original is not a palindrome number";
?>