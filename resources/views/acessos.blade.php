<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@dump($items[0]['data'])

@foreach($items as $item)
    <div>
       <p> Continente: {{$item['data']['continent']['names']['pt-BR']}}</p>
        <p>Cidade {{ $item['data']['city']['names']['en'] ?? 'N/A' }}</p>
    </div>
@endforeach

</body>
</html>
