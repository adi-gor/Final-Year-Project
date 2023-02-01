<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="5" >
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>

	<title> Sensor Data </title>

</head>

<body>

    <h1>SENSOR DATA</h1>
    <h3><a href="http://192.168.43.110/">Motor Status</a></h3>
    <h3><a href="http://localhost:3000/">Generate CSV</a></h3>
<?php
$servername = "localhost";
$username = "root";
$password = "rellik";
$dbname = "sensordata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, sensor, location, value1, value2, value3, reading_time FROM sensordata ORDER BY id DESC"; /*select items to display from the sensordata table in the data base*/

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <th>ID</th> 
        <th>Date & Time</th> 
        <th>Sensor</thh> 
        <th>Location</th> 
        <th>Temperature</th> 
        <th>Humidity</th>
        <th>Rainfall</th>       
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_reading_time = $row["reading_time"];
        $row_sensor = $row["sensor"];
        $row_location = $row["location"];
        $row_value1 = $row["value1"];
        $row_value2 = $row["value2"]; 
        $row_value3 = $row["value3"]; 
        
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
       // $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
        if ($row_value3 == '0')
        {
            $rain_value = "Raining";
        }
        if ($row_value3 == '1')
        {
            $rain_value = "Not Raining";
        }
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_reading_time . '</td> 
                <td>' . $row_sensor . '</td> 
                <td>' . $row_location . '</td> 
                <td>' . $row_value1 . '</td> 
                <td>' . $row_value2 . '</td>
                <td>' . $rain_value . '</td>
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>

</body>
</html>

	</body>
</html>
