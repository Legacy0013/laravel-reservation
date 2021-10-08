<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact du site</title>
</head>
<body>
    <ul>
        <li>{{ $tab['nom'] }}</li>
        <li>{{ $tab['prenom'] }}</li>
        <li>{{ $tab['arrivee'] }}</li>
        <li>{{ $tab['depart'] }}</li>
        <li>{{ $hotels[$tab['hotel']] }}</li>
        <li>{{ $tab['adultes'] }}</li>
        <li>{{ $tab['enfants'] }}</li>
        <li>{{ $tab['demo2'] }}</li>
        <li>{{ $tab['time'] }}</li>
        <li>{{ $tab['message'] }}</li>
    </ul>
</body>
</html>