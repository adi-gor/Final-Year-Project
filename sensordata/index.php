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
    <h3><a href="dashboard.html">Data Collection Dashboard</a></h3>
    <h3><a href="http://localhost:3000/">Export as CSV</a></h3>
    <h3><a href="http://127.0.0.1:2222/">Crop Recommendation System</a></h3>
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

$sql = "SELECT id, SENSORS, LOCATION, TEMPERATURE, HUMIDITY, SOIL_MOISTURE, READING_TIME FROM sensordata ORDER BY id DESC"; /*select items to display from the sensordata table in the data base*/

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <th>ID</th> 
        <th>Date & Time</th> 
        <th>Sensors</thh> 
        <th>Location</th> 
        <th>Temperature</th> 
        <th>Humidity</th>
        <th>Soil Moisture %</th>       
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_reading_time = $row["READING_TIME"];
        $row_sensor = $row["SENSORS"];
        $row_location = $row["LOCATION"];
        $row_value1 = $row["TEMPERATURE"];
        $row_value2 = $row["HUMIDITY"]; 
        $row_value3 = $row["SOIL_MOISTURE"]; 
        
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
       // $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));\
        
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_reading_time . '</td> 
                <td>' . $row_sensor . '</td> 
                <td>' . $row_location . '</td> 
                <td>' . $row_value1 . '</td> 
                <td>' . $row_value2 . '</td>
                <td>' . $row_value3 . '</td>
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
