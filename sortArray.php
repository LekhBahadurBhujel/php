<?php
$arr = [5, 3, 8, 1, 2];

for ($i = 0; $i < count($arr); $i++) {
    for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] > $arr[$j]) {
        
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
    }
}

echo "Ascending Order: ";
foreach ($arr as $asc) {
    echo $asc. " ";
}


$arr = [5, 3, 8, 1, 2]; 

for ($i = 0; $i < count($arr); $i++) {
    for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] < $arr[$j]) {
    
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
    }
}

echo "<br> Descending Order: ";
foreach ($arr as $desc) {
    echo $desc . " ";
}
?>