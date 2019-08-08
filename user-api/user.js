const mongoose = require('mongoose');
const Schema = mongoose.Schema;
const db = require('./db.js');
const autoIncrement = require('mongoose-auto-increment');

app.get('/user', (req, res) => {
  User.find().then((user) => {
    res.send({user});
  }, (e) => {
    res.status(400).send(e);
  });
});

app.post('/user', (req, res) => {
    var user = new User({
        userID : req.body.userID,
        email: req.body.email,
        password: req.body.password,
        role: req.body.role
    });
    user.save().then((user) => {
        res.send(user);
    }, (e) => {
        res.status(400).send(e);
    });
});

app.get('/user/:userID', (req, res) => {
    var userID = req.params.userID;
  
    User.findOne({userID:userID}).then((user) => {
      res.send(user);
    }, (e) => {
      res.status(400).send(e);
    });
});

app.put('/user/:userID', (req, res) => {
    var query = { userID: req.params.userID };
  
    User.findOneAndUpdate(query, {
      role: req.body.role,
      password: req.body.password
    }, {upsert:true}, (e, raw) => {
      if (e) {
        res.status(400).send('Invalid user supplied');
      }
      res.send(raw);
    });
});

app.delete('/user/:userID', (req, res) => {
    var query = { userID: req.params.userID };
    User.findOneAndRemove(query, 
      (e, raw) => {
        if (e) {
          res.status(400).send('Invalid username supplied');
        }
      res.send(raw);
    });
});

var userSchema = new Schema({
    userID: {
        type: Number,
        required: true,
        unique: true
    },
    email: {
        type: String,
        required: true,
        unique: true
    },
    password: {
        type: String,
        required: true,
        unique: true
    },
    role: {
        type: String,
        required: true,
        default: 'user'
    },
    dateAdded : { type: Date, default: Date.now },
})

const User = mysql.model('User', userSchema);
autoIncrement.initialize(mysql.connection);
userSchema.plugin(autoIncrement.plugin, { model: 'User', field: 'userID' });

module.exports = {
    User
};

