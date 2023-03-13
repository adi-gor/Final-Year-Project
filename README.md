# Automation in Irrigation using IoT
One of the major problems faced by people working in agriculture is the problem
of switching on/off the motor used for supplying water to
the field. Manually switching on/off the motor is both time
consuming and needs constant supervision. It is possible to
automate this process by using sensor and microcontroller. In
our system we have gotten soil moisture data in real time from
capacitive soil moisture sensor. This data is transmitted using
WiFi enabled microcontroller that is Node MCU (ESP8266).
This live data is stored in a MySQL database and displayed on
a website that is locally hosted. Users can log in and view soil
moisture readings taken frequently and opt to send a signal to
the microcontroller to turn the motor on/off depending on the
moisture values. The current motor status is displayed to the
users. In addition to that, temperature and humidity sensors
have also been connected with the microcontroller and their
output displayed to the user on the website. The data acquired
from the sensors through the microcontroller is also sent to
third party analytics service so that real time graph plotting
can be done via a webpage which shows live sensor value
vs timestamp which is displayed to the user. Users can also
download the live data captured in CSV (Comma Separated
Values) format.
