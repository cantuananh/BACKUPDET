// var mongoose = require('mongoose');

// const mlabURI = 'mongodb://localhost:27017/DB, { useNewUrlParser: true }/user-api'
// const dbName = 'user-api';

// const connect = mongoose.connect(mlabURI, { useNewUrlParser: true }, (error) => {
// 	if(error){
// 		console.log("Error " + error);
// 	}else{
// 		console.log("Connected successfully to server")
// 	}
// });

// module.exports = connect;

var mysql = require('mysql');

var connect = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "root",
    database: "nodemysql"
});

connect.connect(function(err) {
    if (err) throw err;
    console.log("Connected!!!")
  });
