var express = require('express');
var app = express();

app.use(function (req, res, next) {
    console.log('Time:', data.now());
    next();
});
 app.get('/use/:id', function(req, res, next) {
     res.send('USER')
 })

 app.get('/user/:id', function(req, res, next) {
     console.log('ID:', req.params.id)
 })

app.listen(3001);