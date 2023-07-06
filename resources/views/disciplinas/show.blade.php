<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
                   maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disciplina</title>
</head>

<body>
    <h2>Disciplina {{ $disciplina->nome }}</h2>
    <div>
        @include('disciplinas.shared.fields', ['readonlyData' => true])
    </div>
</body>

</html>
