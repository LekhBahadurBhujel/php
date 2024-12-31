<?php
function transpose3x3($matrix) {
    // Ensure the matrix is 3x3
    if (count($matrix) != 3 || count($matrix[0]) != 3) {
        throw new Exception("Matrix must be 3x3.");
    }

    $transpose = [];
    
    // Calculate the transpose
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $transpose[$j][$i] = $matrix[$i][$j];
        }
    }

    return $transpose;
}

// Example usage
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

try {
    $result = transpose3x3($matrix);
    
    // Print the transposed matrix
    echo "The transposed matrix is:\n";
    foreach ($result as $row) {
        echo implode(" ", $row) . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>