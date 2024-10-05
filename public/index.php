<?php require "../vendor/autoload.php" ;

$router = new AltoRouter() ;



//Etalissement d'une route vers la page d'accueil
$router->map('GET', '/', function() {
    
    //j'importe le fichier home.php
    require "../templates/home.php" ;

},'home');



//On etablis la liste des routes dans un tableau $match
$match = $router->match();

//Une condition pour verifier si une route existe au cas contraire en envoie une erreur 404
if( is_array($match) && is_callable( $match['target'] ) ) { //Cette condtiton verifie si matche est un array et si il contient la route

    //si oui on utilise la fonction call_user_func_array pour appeler la fonction correspondante etablie dans la route ( function () {})
	call_user_func_array( $match['target'], $match['params'] );

} else {
	// Dans le cas contraire on envoie une erreur 404
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "Page not found";
}



