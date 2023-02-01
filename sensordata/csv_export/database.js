const mysql = require('mysql');

var connection = mysql.createConnection({
	host : 'localhost',
	database : 'sensordata',
	user : 'root',
	password : 'rellik'
});

connection.connect(function(error){
	if(error)
	{
		throw error;
	}
	else
	{
		console.log('MySQL Database is connected Successfully');
	}
});

module.exports = connection;