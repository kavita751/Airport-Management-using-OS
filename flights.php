<?php
include 'config.php';
$sql="SELECT * FROM flights";
$result=mysqli_query($conn, $sql);
?>

<h2>Flight Schedule</h2>
<table>
    <tr>   
    <th>Flight Id</th>
    <th>Flight Name</th>
    <th>Source</th>
    <th>Destination</th>
    <th>departure Time</th>
    <th>Arrival Time</th>
    <th>Status</th>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($result)){?>
    <tr>
        <td><?php echo $row['flight_id']; ?></td>
        <td><?php echo $row['flight_name'];?></td>
        <td><?php echo $row['destination']; ?></td>
        <td> <?php echo$row['departure_time']; ?></td>
        <td><?php echo$row['arrival_time']; ?></td>
        <td><?php echo$row['status']; ?></td>
    </tr>
    <?php } ?>
</table>