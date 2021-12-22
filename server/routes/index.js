var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.send('sa');
});
router.get('/teste/:hum/:temp/:solo', function(req, res, next) {
  console.log(req.params)
  let temperatura = parseFloat(req.params.temp);
  let humidadeAr = parseFloat(req.params.hum)
  let humidadeSolo = parseFloat(req.params.solo);
  let stringFinal = ""
  if(temperatura >= 20.9 || humidadeAr >= 80.0){
    stringFinal += "abrir janelas\n";
  }else if(temperatura <=19.8){
    stringFinal += "ligar luzes de aquecimento\n";
  }else{
    stringFinal += "swag\n";
  }
  
  //humidadeSolo ∈ [0,1024]
  if(humidadeSolo < 300){
    res.send(stringFinal + "\nregar")
  }else{
    res.send(stringFinal)
  }
});



module.exports = router;
