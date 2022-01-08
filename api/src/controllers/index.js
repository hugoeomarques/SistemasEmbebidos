var express = require('express');
var router = express.Router();
var app = express();
const controllers = {}
const sequelize = require('../model/database');
const Dados = require('../model/Dados');
const Rega = require('../model/Rega');
const Janela = require("../model/Janela");
const { DATE } = require('sequelize');
const Sequelize = require('sequelize')
const { QueryTypes } = require('sequelize');


sequelize.sync();

controllers.sendData = async (req,res) => {
    // data
    console.log(req.params);
    let temperatura = parseFloat(req.params.temp);
    let humidadeAr = parseFloat(req.params.hAr)
    let humidadeSolo = parseFloat(req.params.hSolo);
    let co2 = parseFloat(req.params.Co2)
    
      // create
      const data = await Dados.create({
      temperatura: temperatura,
      hAr: humidadeAr,
      hSolo: humidadeSolo,
      co2: co2,
      }) .then(function(data){
        return data;
        })
        .catch(error =>{
        console.log("Erro: "+error)
        return error;
        })
        // return res
      /*res.status(200).json({
          success: true,
  message:"Registado",
  data: data
      });*/
     


let stringFinal = ""
if(temperatura >= 20.9 || humidadeAr >= 80.0 || co2 == 0.0){
  let dataAgr = new Date();
  console.log(dataAgr)
  stringFinal += "abrir janelas\n";
  const data = await Janela.create({
    janela: dataAgr,
  });
  
}else if(temperatura <=19.8){
  stringFinal += "ligar luzes de aquecimento\n";
}else{
  stringFinal += "swag\n";
}

//humidadeSolo ∈ [0,1024]
if(humidadeSolo < 52 || (new Date()).getHours() == 6 || (new Date()).getHours() == 22) {
  
  let ultRega = new Date();
  const data = await Rega.create({
    rega: ultRega,
  })

  stringFinal += "\nregar"
}
res.send(stringFinal)
  console.log(stringFinal);

}



controllers.requestData = async (req,res) => {
  // data
 
  const queryDados = `SELECT * FROM "dados" 
            order by "dados"."id" DESC
            LIMIT 1 ;`
            const dados = await sequelize.query(queryDados,{ type: QueryTypes.SELECT });
  const queryJanela = `SELECT * FROM "janelas" 
  order by "janelas"."id" DESC
  LIMIT 1 ;`
  const janela = await sequelize.query(queryJanela,{ type: QueryTypes.SELECT });
  const queryRega = `SELECT * FROM "regas" 
  order by "regas"."id" DESC
  LIMIT 1 ;`
  const rega = await sequelize.query(queryRega,{ type: QueryTypes.SELECT });
           
  const data = {
     dados: dados,
     ultimaAberturaJanela: janela,
     ultimaRega: rega
  }

  console.log(data)

  res.send(data);
}



module.exports = controllers;
