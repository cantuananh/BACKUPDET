


const router = app => {
    app.get('/', (request, response) => {
        response.send({
            message: 'Hello, server!'
        });
    });
    app.get('/users', (request, response) => {
        response.send(users);
    });
}

const users = [{
    id: 1,
    name: "Can Tuan Anh",
    email: "anh.ct@deha-soft.com",
},
{
    id: 2,
    name: "Hoang Phan Trung Hieu",
    email: "hieu.hpt@deha-soft.com",
},
{
    id: 3,
    name: "Son",
    email: "son@deha-soft.com",
},
];
module.exports = router;