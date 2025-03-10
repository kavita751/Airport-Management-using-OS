<?php
include 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name= $_POST['flight_name'];
    $source= $_POST['source'];
    $destination= $_POST['destination'];
    $departure= $_POST['departure_time'];
    $arrival =$_POST['arrival_time'];
    $sql="INSERT INTO flights (flight_name, source, destination, departure_time, arrival_time) VALUES('$nam' , '$source', '$destination', '$departure', '$arrival'";

if(mysqli_query($conn, $sql)){
  echo "Flight Added Successfully.";
}
 else{
    echo "Error: ".mysqli_error($conn);
 }
}
?>
<form method="POST">
    Flight Name: <input type="text" name="flight_name" required> <br><br>
    Source : <input type="text" name= "source" required><br><br>
    Destination : <input type="text" name ="destination" required><br><br>
    Departure : <input type="datetime-local" name="departure_time" required><br><br>
    Arrival : <input type="datetime-local" name="arrival_time" required><br><br>
    <input type="submit" value="Add Flight">
</form>