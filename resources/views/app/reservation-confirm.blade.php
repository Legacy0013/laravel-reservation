<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <main>
        <div class="container">
            <h1>Réservation en ligne</h1>

            <p class="validation"><span>🗸</span> Votre réservation a été prise en compte</p>

            <a href="{{ route('form-contact') }}" class="btn-retour">Réserver un autre séjour</a>
        </div>
    </main>
    <script src="js/app.js"></script>
</body>
</html>