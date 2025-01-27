<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
        $sql = "SELECT * FROM employee";
        $result = $connection->query($sql);
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($rows = $result->fetch_assoc()){
                    echo "<tr>
                        <td>{$rows['id']}</td>
                        <td>{$rows['Name']}</td>
                        <td>{$rows['Gender']}</td>
                        <td>{$rows['Department']}</td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>