# Altrouter

Bienvenue dans le projet  ! Ce document explique comment fonctionne Altrouter et comment exécuter le serveur

## Qu'est-ce qu'Altrouter ?

Altrouter est un micro-routeur pour PHP, permettant de gérer facilement les routes de votre application. Il offre une syntaxe simple et efficace pour définir vos routes et gérer les requêtes a la maniere de express sur nodeJs.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- [PHP](https://www.php.net/) (version 7.1 ou supérieure)
- Composer (pour gérer les dépendances)

## Installation

Pour cloner le projet sur vos machines pour pouvoir parcourir les fichiers et comprendre ce qu'il en retourne

## Exécution du serveur

Pour exécuter le serveur

`php -S localhost:8000 -t public`

### Explication de l'option `-t public`

L'option `-t` définit le répertoire à partir duquel le serveur va servir les fichiers. En utilisant `public`, le serveur va servir les fichiers présents dans le dossier `public`, où vous devriez placer vos fichiers image , video , js et css et autres ressources accessibles publiquement.

## Accéder à l'application

Pour accéder à votre application, ouvrez votre navigateur et allez à l'URL suivante :

http://localhost:8000

## Tests

Assurez-vous que votre application fonctionne correctement en visitant les différentes routes que vous avez définies.


## Aide

Si vous rencontrez des problèmes ou avez des questions, n'hésitez pas à demander de l'aide dans le groupe.

Merci et bon développement avec Altrouter !
Pour en savoir plus sur Altrouter visitez la documentation officielle : https://dannyvankooten.github.io/AltoRouter
