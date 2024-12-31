<?php
function determinant3x3($matrix) {
    // Ensure the matrix is 3x3
    if (count($matrix) != 3 || count($matrix[0]) != 3) {
        throw new Exception("Matrix must be 3x3.");
    }

    // Calculate the determinant
    $det = $matrix[0][0] * ($matrix[1][1] * $matrix[2][2] - $matrix[1][2] * $matrix[2][1])
         - $matrix[0][1] * ($matrix[1][0] * $matrix[2][2] - $matrix[1][2] * $matrix[2][0])
         + $matrix[0][2] * ($matrix[1][0] * $matrix[2][1] - $matrix[1][1] * $matrix[2][0]);

    return $det;
}

// Example usage
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

try {
    $result = determinant3x3($matrix);
    echo "The determinant is: " . $result;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>