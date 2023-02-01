import mysql.connector
from mysql.connector import errorcode
import csv

hdr = ['Sensor', 'Location', 'Value1', 'Value2', 'Value3', 'Reading_Time']

try:
    con = mysql.connector.connect(user='root', password='rellik', host='127.0.0.1', database='sensordata')
except mysql.connector.Error as err:
    print(err)
    exit()
cursor = con.cursor()
query = ('SELECT sensor, location, value1, value2, value3, reading_time FROM sensordata')
cursor.execute(query)

with open('sensordata.csv', 'w', newline='') as fp:
    writer = csv.writer(fp)
    writer.writerow(hdr)

    for (sensor, location, value1, value2, value3, reading_time) in cursor:
        writer.writerow([sensor, location, value1, value2, value3, reading_time])
con.close()