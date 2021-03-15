<?php

require_once "vendor/autoload.php";


$app = new \Slim\Slim();

$db = new mysqli("localhost","root","","pruebas_api");

$app->get("/productos",function() use($db,$app){

  $query = $db->query("SELECT * FROM productos;");

  $productos = array();

  while($fila=$query->fetch_assoc()) {

     $productos[]=$fila;
 

  }

  echo json_encode($productos);

});

$app->post("/productos",function() use($db,$app){

    $query = $db->query("SELECT * FROM productos;");
  
    $productos = array();
  
    while($fila=$query->fetch_assoc()) {
  
       $productos[]=$fila;
   
  
    }
  
    echo json_encode($productos);
  
  });

$app->run();



?>