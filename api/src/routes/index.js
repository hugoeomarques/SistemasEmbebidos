var express = require('express');
var router = express.Router();
var app = express();


const Controller = require('../controllers/index')
router.get('/sendData/:temp/:hAr/:hSolo/:Co2',Controller.sendData);

module.exports = router;
