var express = require('express');
var router = express.Router();
var app = express();


const Controller = require('../controllers/index')
router.post('/sendData',Controller.sendData);

module.exports = router;
