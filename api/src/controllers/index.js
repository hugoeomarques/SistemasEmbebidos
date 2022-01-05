var express = require('express');
var router = express.Router();
var app = express();
const controllers = {}
const sequelize = require('../model/database');
const {Dados} = require('../model/Dados');
const Acoes = require('../model/Acoes');


sequelize.sync()

controllers.sendData = async (req,res) => {
    // data
    const { temp , hAr, hSolo, Co2} = req.body;

    console.log("aqui");
    // create
    const data = await Dados.create({
    temperatura: temp,
    hAr: hAr,
    hSolo: hSolo,
    co2: Co2,
    })
    .then(function(data){
    return data;
    })
    .catch(error =>{
    console.log("Erro: "+error)
    return error;
    })
    // return res
    res.status(200).json({
        success: true,
message:"Registado",
data: data
});

let temperatura = parseFloat(temp);
let humidadeAr = parseFloat(hAr)
let humidadeSolo = parseFloat(hSolo);
let co2 = parseFloat(Co2)
let stringFinal = ""
if(temperatura >= 20.9 || humidadeAr >= 80.0 || co2 == 0.0){
  stringFinal += "abrir janelas\n";
}else if(temperatura <=19.8){
  stringFinal += "ligar luzes de aquecimento\n";
}else{
  stringFinal += "swag\n";
}

//humidadeSolo ∈ [0,1024]
if(humidadeSolo < 52 || (new Date()).getHours() == 6 || (new Date()).getHours() == 22) {
  res.send(stringFinal + "\nregar")
}else{
  res.send(stringFinal)
}
console.log(stringFinal)

}


router.get('/teste/:hum/:temp/:solo/:co2', function(req, res) {
  console.log(req.params)
  /*if(b){
    b = !b
    res.send("abrir janelas\n")
  }
  else{
    b = !b
    res.send("ligar luzes de aquecimento\n")
  }*/

  let temperatura = parseFloat(req.params.temp);
  let humidadeAr = parseFloat(req.params.hum)
  let humidadeSolo = parseFloat(req.params.solo);
  let co2 = parseFloat(req.params.co2)
  let stringFinal = ""
  if(temperatura >= 20.9 || humidadeAr >= 80.0 || co2 == 0.0){
    stringFinal += "abrir janelas\n";
  }else if(temperatura <=19.8){
    stringFinal += "ligar luzes de aquecimento\n";
  }else{
    stringFinal += "swag\n";
  }
  
  //humidadeSolo ∈ [0,1024]
  if(humidadeSolo < 52 || (new Date()).getHours() == 6 || (new Date()).getHours() == 22) {
    res.send(stringFinal + "\nregar")
  }else{
    res.send(stringFinal)
  }
  console.log(stringFinal)
});



module.exports = controllers;
