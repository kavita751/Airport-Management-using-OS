<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];  

$sql = "SELECT name, email FROM passengers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email);
$stmt->fetch();
$stmt->close();

$flights_query = "SELECT flight_name, source, destination, departure_time FROM flights";
$flights_result = $conn->query($flights_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $name; ?>!</h2>
    <p>Email: <?php echo $email; ?></p>
    <h3>Available Flights</h3>
    <table>
        <tr>
            <th>Flight Name</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Departure</th>
        </tr>
        <?php while ($row = $flights_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["flight_name"]; ?></td>
                <td><?php echo $row["source"]; ?></td>
                <td><?php echo $row["destination"]; ?></td> 
                <td><?php echo $row["departure_time"]; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
