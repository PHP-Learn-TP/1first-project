<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  -->
    <title>Confirm</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100 vw-100">
        <div class="col-sm-10 col-md-4">
            <h1 class="fw-bold">Code de confirmation</h1>
            <form method="post" class="my-5">
                <div class="form-group">
                    <input type="number" name="confirm" id="confirm" placeholder="Code de confirmation" class="form-control" required max="999999">
                </div>
                <div class="form-submit d-flex align-items-center justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary">Confirmer</button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>