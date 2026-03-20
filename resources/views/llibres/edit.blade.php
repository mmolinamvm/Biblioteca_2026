<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Editar Llibre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Modificar un llibre</h1>
<h2 class="mb-4">- mmolina@institutmvm.cat -</h2>

<form action="/llibres/editar/{{ $llibre->id }}" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
    @csrf <h1>Titol: {{ $llibre->titol }}</h1>
      <div class="mb-3">
        <label class="form-label">Canviar títol del llibre</label>
        <input type="text" name="titol" class="form-control"  value="{{ $llibre->titol }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Codi ISBN</label>
        <input type="text" name="isbn" class="form-control"  value="{{ $llibre->isbn }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Número de pàgines</label>
        <input type="number" name="pagines" class="form-control"  value="{{ $llibre->pagines }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Preu (€)</label>
        <input type="number" step="0.01" name="preu" class="form-control"  value="{{ $llibre->preu }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Canviar portada del llibre</label>
        <input type="file" name="imatge" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Guardar a la biblioteca</button>
    <a href="/llibres" class="btn btn-link">Tornar enrere</a>
    <br/><br/>
    <div class="col-md-4">
        @if($llibre->imatge)
            <img src="{{ asset('portades/' . $llibre->imatge) }}" class="img-fluid rounded">
        @else
            <img src="https://via.placeholder.com/300x400" class="img-fluid">
        @endif
    </div>
</form>
</body>
</html>
