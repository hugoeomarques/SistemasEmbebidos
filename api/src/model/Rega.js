var Sequelize = require('sequelize');
var sequelize = require('./database');

var Rega = sequelize.define('rega', {
id: {
type: Sequelize.INTEGER,
primaryKey: true,
autoIncrement: true,
},
rega: Sequelize.DATE

},
{
     timestamps: false,
 });

 module.exports = Rega;