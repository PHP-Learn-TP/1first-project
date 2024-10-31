<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  -->
    <title>Page d'inscription</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 vw-100">
        <form method="post" class="form col-sm-10 col-md-4 border border-dark rounded-5 px-3 py-5">
            <h1 class ="fw-bold text-center text-primary my-2">Inscription</h1>
            <div class="form-group">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Nouveau mots de passe</label>
                <input type="text" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group d-flex justify-content-center align-items-center mt-2">
                <button type="submit" class="btn btn-primary mt-3">S'inscrire</button>
            </div>
        </form>
    </div>
</body>
</html>