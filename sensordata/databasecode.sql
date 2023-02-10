
/*creating a table in the database*/
CREATE TABLE sensordata (
  id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  SENSORS varchar(30) not null,
  LOCATION varchar(30) not null,
  TEMPERATURE varchar(10),
  HUMIDITY varchar(10),
  WATER_LEVEL varchar(10),
  READING_TIME TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

