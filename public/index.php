<?php

//le vendor permets d'importer les fichiers composer et de les utiliser comme Alt0router
require "../vendor/autoload.php";



$router = new AltoRouter();


//Au lieu d'un require vers la database je me sert directement des namespaces virtuels

use App\Class\{User, DataManagement, SessionManager};  //Je me sers de l'espace de nommage App\Class pour acceder a la class User dans mes fichier


require_once '../src/Functions/Mailer.php';

use function App\Functions\Mailer\{sendConfirmationMail as sendMail};


//Etalissement d'une route vers la page d'accueil
$router->map('GET', '/', function () {

    $userId = SessionManager::getSession('userId');


    if (!$userId) {
        return header('Location: /signup');
    }

    $pdo = new DataManagement();

    $user = $pdo->getUserById($userId);


    if (!$user) {
        return header('Location: /signup');
    }

    //cette variable peut etre utiliser dans le fichier home.php
    $userInfo = $user;

    //j'importe le fichier home.php
    require "../templates/home.php";
}, 'home');





///
/// Routes liers au connections et inscriptions
///

$router->map('GET', '/signup', function () {

    $userId = SessionManager::getSession('userId');

    if ($userId) {
        $pdo = new DataManagement();

        $user = $pdo->getUserById($userId);

        if ($user) {
            return header('Location: /');
        }
    }

    //Destruction de la session si l'id est inconnus
    SessionManager::destroySession();

    require "../templates/account/signup.php";
}, 'inscription');

//Cas d'une requete POST
$router->map('POST', '/signup', function () {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = new DataManagement();

    try {

        $id = $pdo->registreNewUser($firstname, $lastname, $email, $password);

        SessionManager::setSession('userId', $id);

        header('Location: /confirm');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});



$router->map('GET', '/confirm', function () {

    $id =  SessionManager::getSession('userId');

    if ($id) {

        $pdo = new DataManagement();

        $user = $pdo->getUserById($id);

        if (!$user) {
            SessionManager::destroySession();
            return header('Location: /signup');
        }

        if ($user->is_confirmed()) {

            return header('Location: /');
        }
    }

    $code = rand(10000, 99999);

    sendMail($user, $code);

    SessionManager::setSession('confirm', $code);

    require "../templates/account/confirm.php";
}, 'confirm');


$router->map('POST', '/confirm', function () {

    $userValue = $_POST['confirm'];

    $mainValue = SessionManager::getSession('confirm');

    if ($mainValue == $userValue) {

        $userId = SessionManager::getSession('userId');

        $pdo = new DataManagement();

        $confirmed = $pdo->confirmUser($userId);

        if ($confirmed) {
            return header('Location: /');
        }

        echo "Une erreur est survenue";
    }

    echo "Le code Entrez est incorrect";
});


///
///Fin de la region connections et inscriptions
///


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
