<?php

require_once "vendor/autoload.php";


$app = new \Slim\Slim();
$app->get("/hola/:nombre", function($nombre){

echo "Hola ".$nombre;


});

function pruebaMiddle(){

echo "Soy un middleware<br>";

}

function pruebaMiddleTwo(){

        echo "Soy un middleware 2<br>";
        
        }


$app->get("/pruebas(/:uno(/:dos))", 'pruebaMiddle', 'pruebaMiddleTwo', function($uno=NULL,$dos=NULL){

echo $uno."<br/>";
echo $dos."<br/>";

})->conditions(array(

        "uno" => "[a-zA-Z]*",
        "dos" => "[0-9]*"

));

$app->group("/api", function() use ($app){

   $app->group("/ejemplo", function() use ($app){
                
        $app->get("/hola/:nombre", function($nombre){

                echo "Hola ".$nombre;
                
                });

                $app->get("/dime-tu-apellido/:apellido", function($apellido){

                        echo "Tu apellido es: ".$apellido;
                        
                        });

                $app->get("/redireccioname-a-hola", function() use ($app) {

                                $app->redirect("hola/Josue HAMILTON F1");
                                
                                });

                
        
        });     

});

$app->run();


?>