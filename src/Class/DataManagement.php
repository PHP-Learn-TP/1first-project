<?php

namespace App\Class ;
use PDO;
use App\Class\User;


class DataManagement {

    private $pdo ;

    //Constructor , connecte a la base de données
    public function __construct() {

        $this->pdo = new PDO('sqlite:' . dirname(__DIR__,1). '/database/data.sql',null,null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] ) ;
    }



    /**
     * Enregistre un nouvel utilisateur dans la base de données
     * @param string $fistname le nom de l'utilisateur
     * @param string $lastname le prenom de l'utilisateur
     * @param string $email l'email de l'utilisateur
     * @param string $password le mot de passe de l'utilisateur
     * @return void Ne retourne Rien
     */
    public function registreNewUser(string $fistname, string $lastname, string $email,string $password) : string|bool  {

        $sql = "INSERT INTO users(firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)" ;

        $stmt = $this->pdo->prepare($sql) ;

        $result = $stmt->execute([
            'firstname' => $fistname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password
        ]) ;

        if ($result) {

            return $this->pdo->lastInsertId();

        }
        return false ;
    }


    public function getUserById(int $id) : User | bool {
        
        $sql = "SELECT * FROM users WHERE id = :id" ;

        $stmt = $this->pdo->prepare($sql) ;

        $stmt->execute(['id' => $id]) ;

        //je recupere le resultat en tant qu'instance de la class User
        $user = $stmt->fetchObject(User::class) ;

        return $user ;
    }

    public function confirmUser(int $id) : bool { 

        $sql = "UPDATE users SET confirmed = 1 WHERE id = :id" ;

        $stmt = $this->pdo->prepare($sql) ;

        return $stmt->execute(['id' => $id]) ;
    }
}