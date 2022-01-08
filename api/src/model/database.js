var Sequelize = require('sequelize');
const sequelize = new Sequelize(
'projetoSE',
'postgres',
'martinho',//'password',
{
host: 'localhost',
port: '5432',
dialect: 'postgres',
logging: false
},
);
module.exports = sequelize;