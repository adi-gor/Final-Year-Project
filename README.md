# Automation in Irrigation using IoT and ML based Crop Recommendation System
The project consists of hardware circuit which has an
ESP8266 microcontroller connected with DHT11 and Capacitive Soil Moisture sensors. 
Both of these sensors arerelatively inexpensive and provide fairly accurate values. 
The ESP8266 microcontroller also known as Node MCU is useful
for enabling WiFi connectivity. Users can easily connect to the
Node MCU via their mobile phone. Similarly they can connect
their computer to the phone WiFi and hence data exchange and
communication will be facilitated. As the data recorded from
the sensors is stored in locally hosted database there is no
additional cost to the user. The third party analytics service
that is used in this project i.e. ThingSpeak limits the free
tier version of its service to 3 million messages per year and
message update interval time to 15 seconds. The feature of
downloading sensor data into a CSV format requires MS Excel
or any other application that can read file stored in this format.
The system also features a Machine Learning
based crop recommendation system that is integrated into the
main website. Upon giving the required environmental and
soil parameters, the program recommends most suitable crop
that could be grown by running a highly accurate Machine
Learning Model. This helps the farmer to choose crops that
may give maximum yield. As India is a huge country impacted
by the vagaries of climate, appropriate crop selection becomes
a question of utmost importance.

A. Node MCU connectivity

Users have to first connect their mobile phone to the Node
MCU. This is required to establish stable connection. Users
should also have their device connected to their computer.

B. Data acquisition from sensors

The values returned by the soil moisture sensor and DHT11
sensor in real time are sent to a locally hosted Apache server
and are stored in MySQL database. The same data is also sent
to third party analytics service ThingSpeak, in which a channel
has been created to record and display real time change in
sensor values by plotting a value vs timestamp graph.

C. Login page

A login page has been created that needs user name and
password for authentication. In order to login to the system to
view the main webpage users need to provide their email ID
as username and a 6 letter password. Authentication has been
achieved by writing a code snippet in JavaScript.

D. Sensor Data

The real time values stored in the database are being
constantly updated and are displayed on an automatically
updating web page. The web page shows data such as date
and time, location and sensor values. This interface has been
developed with HTML and CSS and PHP has been used in
the backend to fetch data from the database. The web interface
links to all the features provided by the system.

E. Motor Status

If the user notices that the soil moisture level readings taken
in real time are somehow less than what is predetermined
than the user can click on motor status link which will
take the user to a new page where he/she will be provided
with a button through which an on command can be sent to
the microcontroller. The microcontroller which receives the
command can transmit it to a relay. The relay sends the signal
to motor which is finally turned on. After sometime when
moisture level has been restored the user can press the same
button on the motor status webpage that could send an off
signal to the microcontroller. The microcontroller passes this
signal to the motor through relay and the motor is finally
turned off.

F. Data Collection Dashboard

The data collection dashboard shows a webpage that displays the frequently updating values from the ThingSpeak
channel. Users have not been granted direct access to ThingSpeak channel due to privacy and security concerns related to
API keys.

G. Export as CSV

If the user wants to download a snapshot of the sensor
readings taken during any particular time, he/she can do so
by going to the export as CSV page here the sensor readings
along with the timestamp (in GMT) have been made available.
Uses can download the CSV file and open it by using an
appropriate application like MS Excel or Google Sheets. This
is useful if the user wants to run his/her own analytics locally
such as generating descriptive statistics on the sensor data.
This feature has been developed using Express.js and makes
use of EJS for generating HTML markup.

H. Crop Recommendation System

A crop recommendation system has been developed which predicts the most suitable crop based on a variety of environmental and soil parameters. 22 different types of crops are recommended by this system. The dataset used for training and testing of the machine learning model has been acquired from https://www.kaggle.com/datasets/atharvaingle/crop-recommendation-dataset. The parameters used in this system are Nitrogen, Phosphorus and Potassium content and pH value of the soil, Temperature, Humidity and average Rainfall in mm. Some of the data is collected i.e. Temperature and Humidity has been collected from the sensors earlier. NPK content and pH of the soil can be obtained from district wise government soil testing laboratory and average rainfall of every district can be obtained from Indian Meteorological Department (IMD) website. After satisfying the input constraints of the application, the program outputs the recommended crop after running a Machine Learning model. The model used in this application is K Nearest Neighbours, which gives a highly accurate result. This feature has been developed mainly using Python library Scikit-learn for machine learning tasks and PySimpleGUIWeb for user interface.
