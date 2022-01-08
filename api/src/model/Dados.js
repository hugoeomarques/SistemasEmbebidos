var Sequelize = require('sequelize');
var sequelize = require('./database');
sequelize.sync()


var Dados = sequelize.define('dados', {
id: {
type: Sequelize.INTEGER,
primaryKey: true,
autoIncrement: true,
},
temperatura: Sequelize.FLOAT,
hAr: Sequelize.FLOAT,
hSolo: Sequelize.FLOAT,
co2: Sequelize.FLOAT,

},
{
    // timestamps: false,
 });



 module.exports = Dados