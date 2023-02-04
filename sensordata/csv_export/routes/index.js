var express = require('express');
var router = express.Router();

var database = require('../database');

var data_exporter = require('json2csv').Parser;

/* GET home page. */
router.get('/', function(req, res, next) {

    database.query('SELECT sensor, location, value1, value2, value3, reading_time FROM sensordata', function(error, data){

        res.render('index', { title: 'Express', sensordata:data });

    });
    
});

router.get('/export', function(request, response, next){

    database.query('SELECT sensor, location, value1, value2, value3, reading_time FROM sensordata', function(error, data){

        var mysql_data = JSON.parse(JSON.stringify(data));

        //convert JSON to CSV Data

        var file_header = ['Sensor', 'Location', 'Value1', 'Value2', 'Value3', 'Reading_Time'];

        var json_data = new data_exporter({file_header});

        var csv_data = json_data.parse(mysql_data);

        response.setHeader("Content-Type", "text/csv");

        response.setHeader("Content-Disposition", "attachment; filename=sensordata.csv");

        response.status(200).end(csv_data);

    });

});

module.exports = router;