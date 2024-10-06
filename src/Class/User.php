<?php


//Le namespace est un espace virtuel creer pour remplacer l'usage abusif et compliquer d'un require
namespace App\Class;


/**
 * Represente un utilisateur ou un developeurs
 */
class User {

    //Les   Renseignement de l'utilisateurs , je vais metttre des valeurs par default pour un text
    private $firstName = 'John' ;
    private $lastName = 'Doe' ;
    private $email = 'john.doe@gmail.com' ;

    //La liste des language cible de l'utilisateur dans un array []
    private $language = ['PHP', 'Javascript', 'Python'] ;




    /**
     * Elle retourne les information de l'utilisateur
     * @return array
     */
    public function getUserInformation() : array {
        
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'language' => $this->language
        ] ;
    }
    
    /* Quand a la question a savoir pouquoi preferer une fonction qui retourne des inforamation
        alors que nous pouvons tous simplement les declarer en public , la reponse est juste pour
        une meilleur securiter car l'erreur peu nous conduire a ecraser leurs valeurs alors 
        qu'avec une fonction ou un getters on ne peux que lire(Le fameux readonly 😂)*/
}