var Sequelize = require('sequelize');
var sequelize = require('./database');

var Janela = sequelize.define('janela', {
id: {
type: Sequelize.INTEGER,
primaryKey: true,
autoIncrement: true,
},
janela: Sequelize.DATE

},
{
     timestamps: false,
 });

 module.exports = Janela;