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
<div class="container mt-5">
    <h1>{{ $llibre->titol }}</h1>
    <div class="row">
        <div class="col-md-4">
            @if($llibre->imatge)
                <img src="{{ asset('portades/' . $llibre->imatge) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/300x400" class="img-fluid">
            @endif
        </div>
        <div class="col-md-8">
            <p><strong>Autors:</strong></p>
            <ul>
                @foreach($llibre->autors as $autor)
                    <li>{{ $autor->name }}</li>
                @endforeach
            </ul>
            <p><strong>ISBN:</strong> {{ $llibre->isbn }}</p>
            <p><strong>Pàgines:</strong> {{ $llibre->pagines }}</p>
            <p><strong>Preu:</strong> {{ $llibre->preu }} €</p>
            <a href="/llibres" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>
</table>
</body>
</html>

