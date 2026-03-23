<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1 class="mb-4">Llistat de Llibres</h1>
<h2 class="mb-4">- mmolina@institutmvm.cat -</h2>
<a href="/llibres/crear" class="btn btn-success mb-3">Afegir un llibre nou</a>
<a href="/autors" class="btn btn-info mb-3">Veure autors</a>
<a href="/llibresxautors" class="btn btn-info mb-3">Veure llibres x autors</a>
<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Títol</th>
        <th>Autors</th>
    </tr>
    </thead>
    <tbody>
    @forelse($llibres as $llibre)
        <tr>
            <td>{{ $llibre->titol }}</td>
            <td>
                <ul>
                    @forelse($llibre->autors as $autor)
                        <li>{{ $autor->name }}</li>
                    @empty
                        No hi ha autor assignat.
                    @endforelse
                </ul>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">No hi ha llibres a la biblioteca.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
