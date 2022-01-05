var Sequelize = require('sequelize');
var sequelize = require('./database');

var Dados = sequelize.define('acoes', {
id: {
type: Sequelize.INTEGER,
primaryKey: true,
autoIncrement: true,
},
aberturaJanela: Sequelize.DATE,
rega: Sequelize.DATE

},
{
     timestamps: false,
 });
