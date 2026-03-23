<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1 class="mb-4">Llistat d'autors</h1>
<h2 class="mb-4">-mmolina@institutmvm.cat–</h2>
<a href="/autors/crear" class="btn btn-success mb-3">Afegir un autor nou</a>
<a href="/llibres" class="btn btn-info mb-3">Veure llibres</a>
<a href="/llibresxautors" class="btn btn-info mb-3">Veure llibres x autors</a>
<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Nom</th>
        <th>Nacionalitat</th>
        <th>Date naixement</th>
        <th>Date defunció</th>
    </tr>
    </thead>
    <tbody>
    @forelse($autors as $autor)
        <tr>
            <td>{{ $autor->name }}</td>
            <td>{{ $autor->nacionality }}</td>
            <td>{{ $autor->birth_date }}</td>
            <td>{{ $autor->death_date }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">No hi han autors a la biblioteca.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
