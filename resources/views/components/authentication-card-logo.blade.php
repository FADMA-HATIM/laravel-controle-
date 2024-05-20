<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image en petite taille</title>
    <style>
        .small-img {
            width: 100px; /* largeur de l'image */
            height: auto; /* la hauteur s'ajustera en conséquence pour conserver les proportions */
        }
    </style>
</head>
<body>
    <a href="/">
        <img src="{{ asset('assets/img/oo.png') }}" class="small-img" alt="Petite image">
    </a>
</body>
</html>
