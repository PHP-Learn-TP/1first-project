<?php

//le vendor permets d'importer les fichiers composer et de les utiliser comme Alt0router
require "../vendor/autoload.php";



$router = new AltoRouter();


//Au lieu d'un require vers la database je me sert directement des namespaces virtuels

use App\Class\User;  //Je me sers de l'espace de nommage App\Class pour acceder a la class User dans mes fichier
                    // autre maniere d'ecrire use App\Class\{User , Admin , ....};



//Etalissement d'une route vers la page d'accueil
$router->map('GET', '/', function () {


    //j'importe le fichier home.php
    $user = new User() ;



    //cette variable peut etre utiliser dans le fichier home.php
    $userInfo = $user->getUserInformation();


    require "../templates/home.php";



}, 'home');




//On etablis la liste des routes dans un tableau $match
$match = $router->match();


//Une condition pour verifier si une route existe au cas contraire en envoie une erreur 404
if (is_array($match) && is_callable($match['target'])) { //Cette condtiton verifie si match est un array et si il contient la route

    //si oui on utilise la fonction call_user_func_array pour appeler la fonction correspondante etablie dans la route ( function () {})
    call_user_func_array($match['target'], $match['params']);
    

} else {

    // Dans le cas contraire on envoie une erreur 404
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "Page not found";


}
