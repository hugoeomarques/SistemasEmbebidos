<?php

$ligacao=pg_pconnect("host=localhost port=5432 dbname=projetoSE user=postgres password=martinho");

$pg='DELETE FROM dados';


if (pg_query($ligacao,$pg)) {
  echo "alert('Reset efetuado com sucesso!')";
   header("Location: index.php");
} else {
  echo "Falha no reset!" . pg_error($ligacao);
   header("Location: index.php");
}



pg_close($ligacao);
?>             