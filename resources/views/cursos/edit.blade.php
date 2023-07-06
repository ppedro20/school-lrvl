<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
 maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso</title>
</head>

<body>
    <h2>Alterar {{ $curso->nome }}</h2>
    <form method="POST" action="{{ route('cursos.update', ['curso' => $curso]) }}">
        @csrf
        @method('PUT')
        @include('cursos.shared.fields')
        <div>
        <button type="submit" name="ok">Guardar curso</button>
        </div>
        </form>
</body>

</html>
