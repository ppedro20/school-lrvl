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
    <h2>Novo Curso</h2>
    <form method="POST" action="{{ route('cursos.store') }}">
        @csrf
        @include('cursos.shared.fields')
        <div>
        <button type="submit" name="ok">Guardar novo curso</button>
        </div>
        </form>
</body>

</html>
