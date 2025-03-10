<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport Management</title>
    <link rel="stylesheet"  type="text/css" href="style.css">
</head>
<body>
    <h2>Flight Schedule</h2>
    <table>
        <tr>
            <th>Flight Name</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Status</th>
        </tr>
        <?php
        $sql ="SELECT * FROM flights ORDER BY departure_time ASC";
        $result= mysqli_query($conn, $sql);
        while($row= mysqli_fetch_assoc($result)){
            echo "<tr>
            <td> {$row['flight_name']}</td>
            <td>{$row['source']}</td>
            <td>{$row['destination']}</td>
            <td>{$row['departure_time']}</td>
            <td>{$row['arrival_time']}</td>
            <td>{$row['status']}</td>";
        }
        ?>
    </table>
    
</body>
</html>