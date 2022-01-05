var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.send('sa');
});
//let b = true


router.get('/teste/:hum/:temp/:solo/:co2', function(req, res, next) {
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
  if(humidadeSolo < 52 || /*( ((new Date()).getHours() == 6 || (new Date()).getHours() == 22)) */) {
    res.send(stringFinal + "\nregar")
  }else{
    res.send(stringFinal)
  }
  console.log(stringFinal)
});



module.exports = router;
