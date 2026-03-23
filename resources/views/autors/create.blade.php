<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Nou Llibre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Afegir un nou Autor</h1>
<h2 class="mb-4">- mmolina@institutmvm.cat -</h2>

<form action="/autors/crear" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">

    @csrf  <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Nacionalitat</label>
        <input type="text" name="nacionality" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Data naixement</label>
        <input type="date" name="birth_date" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Data defunció</label>
        <input type="date" name="death_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar a la biblioteca</button>
    <a href="/llibres" class="btn btn-link">Tornar enrere</a>
</form>
</body>
</html>
