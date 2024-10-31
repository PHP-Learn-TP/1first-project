<?php


//Le namespace est un espace virtuel creer pour remplacer l'usage abusif et compliquer d'un require
namespace App\Class;


/**
 * Represente un utilisateur ou un developeurs
 */
class User
{

    private $id ;
    //Les   Renseignement de l'utilisateurs , je vais metttre des valeurs par default pour un text
    private $firstname ;
    private $lastname ;
    private $email ;

    private $password ;


    //Verifie si l'utilisateur est verifier
    private $confirmed ;

    private $created_at ;

    public function get_firstname(): string
    {
        return $this->firstname;
    }

    public function get_lastname(): string
    {
        return $this->lastname;
    }

    public function get_email(): string
    {
        return $this->email;
    }
    // public function get_language(): array
    // {
    //     return isset($this->language) ? $this->language : [];
    // }

    public function get_password(): string
    {
        return $this->password;
    }

    public function is_confirmed() {
        return $this->confirmed == 1 ? true : false;
    }


    /* Quand a la question a savoir pouquoi preferer une fonction qui retourne des inforamation
        alors que nous pouvons tous simplement les declarer en public , la reponse est juste pour
        une meilleur securiter car l'erreur peu nous conduire a ecraser leurs valeurs alors 
        qu'avec une fonction ou un getters on ne peux que lire(Le fameux readonly 😂)*/
}
