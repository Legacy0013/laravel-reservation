<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <style>
        .top  {
            display: flex;
            justify-content: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 2em;
            text-decoration: underline;
        }
        .left {
            width: 30%;
        }
        .right {
            width: 30%;
        }
        .bottom  {
            display: flex;
            justify-content: center;
        }
        @media screen and (max-width: 768px){
            .left {
                width: 50%;
            }
            .right {
                width: 50%;
            }
        }
        @media screen and (max-width: 578px){
            .top  {
                align-items: center;
            flex-direction: column;
            }
            .left {
                width: 100%;
            }
            .right {
                width: 100%;
            }
        }
    </style>
</head>
<body style="background:#151529; color:#fff;font-family: 'Roboto', sans-serif;">
    <h2>Réservation du {{ $contact['dateCommande'] }}</h2>
    <div class="top">
        <div class="left">
            <div class="client">
                <p><strong>Nom : </strong>{{ $contact['nom'] }}</p>
                <p><strong>Prénom :</strong> {{ $contact['prenom'] }}</p>
            </div>
            <div class="dates">
                <p><strong>Date d'arrivée :</strong> {{ $contact['arrivee'] }}</p>
                <p><strong>Date de départ :</strong> {{ $contact['depart'] }}</p>
            </div>
        </div>
        <div class="right">
            <p><strong>Nom de l'hotel :</strong> {{ $contact['hotel'] }}</p>
            <p><strong>Nombre d'adultes :</strong> {{ $contact['adultes'] }}</p>
            <p><strong>Nombre d'enfants :</strong> {{ $contact['enfants'] }}</p>
            <p><strong>Petit déjeuner :</strong> {{ $contact['demo2'] }}</p>
            <p><strong>Heure estimmée d'arrivée :</strong> {{ $contact['time'] }}</p>
        </div>
    </div>
    <div class="bottom">
        <p><strong>Message: </strong> <br> {{ $contact['message'] }}</p>
    </div>
</body>
</html>