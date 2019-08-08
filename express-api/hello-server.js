var http = require('http');
 
var server = http.createServer(function(request, response){
    response.writeHead(200, {
        "Context-type" : "text/plain"
    });
     
    response.write('Your URL is ' + request.url);
     
    response.end();
});
 
server.listen(3001, function(){
    console.log('Server is listening on port 3001!');
});