<?php

namespace App\Class;

class SessionManager {

    //Lancer la Session si Desactiver
    static function startSession() {
        if (session_status() == PHP_SESSION_NONE) { 
            session_start();
        }
    }

    //Detruire la Session dans le cas d'une deconnection
    static function destroySession() {
        session_destroy();
    }

    //Definir une session
    static function setSession($key, $value) { 
        SessionManager::startSession();
        $_SESSION[$key] = $value;
    }


    //Recuperer une session
    static function getSession($key) {
        SessionManager::startSession();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
}