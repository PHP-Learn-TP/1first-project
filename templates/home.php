<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page D'accueil</title>
</head>

<body style="text-align: center;">
    <!-- Etant donnees que ce contenue est coller dans le index.php , tout ce qui est declarer la est accessible ici , d'ou l'usage de $userInfo declarer dans la route home -->
    Hello <br>
    je m'appelle <?= $userInfo->get_firstname() ?> <?= $userInfo->get_lastname() ?> <br>
    Et voici mon email : <?= $userInfo->get_email()?>
</body>

</html>