<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}}">
</head>
<body>
    <h3 style="text-align: center"><strong>Bonjour {{ $data['name'] }}, </strong></h3>
    <p>
        @php
            echo $data['message']
        @endphp
    </p>
    <footer>Nous vous souhaitons un bon spectacle et Merci pour votre confiance.</footer>

    <script src="{{ (mix('js/app.js'))}}"></script>
</body>
</html>