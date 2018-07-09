<?php

  include 'includes/time_zone.php';


  function calcular_edad($fecha){
    $fecha_nacimiento = explode("-",date("Y-m-d",strtotime($fecha)));
    $fecha_actual = explode("-",date("Y-m-d"));

    $Edad = $fecha_actual[0]-$fecha_nacimiento[0];
    if($fecha_actual[1]<=$fecha_nacimiento[1] and $fecha_actual[2]<=$fecha_nacimiento[2]){
    $Edad = $Edad - 1;
    }
    echo $Edad." años";
  }

  function calcular_edad2($fecha){
    $fecha_nacimiento = explode("-",date("Y-m-d",strtotime($fecha)));
    $fecha_actual = explode("-",date("Y-m-d"));

    $Edad = $fecha_actual[0]-$fecha_nacimiento[0];
    if($fecha_actual[1]<=$fecha_nacimiento[1] and $fecha_actual[2]<=$fecha_nacimiento[2]){
    $Edad = $Edad - 1;
    }
    return $Edad." años";
  }

 ?>
