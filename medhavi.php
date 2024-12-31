<?php

$colleges = [
    "Kathmandu College of Management",
    "Nepal Engineering College",
    "Medhavi College",
    "Kantipur Engineering College",
    "Patan College for Professional Studies"
];


$searchCollege = "Medhavi College";


$isPresent = false;

foreach ($colleges as $college) {
    if (strcasecmp($college, $searchCollege) === 0) {
        $isPresent = true;
        break;
    }
}


if ($isPresent) {
    echo "$searchCollege is present in Kathmandu Metropolitan's college list.";
} else {
    echo "$searchCollege is not present in Kathmandu Metropolitan's college list.";
}
?>