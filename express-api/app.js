const express = require('express');
const port = 3002;
const bodyParser = require('body-parser');
const app = express();

const routes = require('./routes');


 
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true,
}));
 
// app.get('/', (request, response) => {
//     response.send({
//         message: 'Node.js and Express REST API'}
//     );
// });

routes(app);
const server = app.listen(port, (error) => {
    if (error) return console.log(`Error: ${error}`);
 
    console.log(`Server listening on port ${server.address().port}`);
});