<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page d'accueil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            
            font-family: Arial, sans-serif;

        }

        .image-container {
            width: 650px;
            
            height: 450px;
            
            overflow: hidden;
            margin-left: 30px;
            
            transition: transform 0.5s ease;
        
        }

        .image-container img {
            width: 100%;
            height: auto;
        }

        .task-title {
            padding: 30px;
            border: 1px solid #dee2e6;
            color: #000;
            
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            
            transition: transform 0.5s ease;
            
            position: relative;
        }




        /* Effet de survol sur les boutons */
        .btn-primary:hover,
        .btn-info:hover,
        .btn-success:hover {
            opacity: 0.8;
            /* Légère transparence au survol */
            transform: scale(1.05);
            /* Légère mise à l'échelle */
        }

        /* Animation pour mouvement au survol */
        .image-container:hover,
        .task-title:hover {
            transform: translateY(-10px);
            /* Déplacement vers le haut au survol */
        }

        /* Style pour les liens des flèches */
        .arrow-link {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 30px;
            transform: rotate(45deg);
            /* Rotation de la flèche */
            color: #007bff;
            /* Couleur de la flèche */
            text-decoration: none;
            /* Supprime le soulignement du lien */
            transition: color 0.3s;
            /* Animation de transition */
        }

        .arrow-link:hover {
            color: #0056b3;
            /* Couleur de la flèche au survol */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-end mt-3">
                @if (Route::has('login'))
                <div>
                    @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="image-container" id="image-container">
                    <img src="assets/img/th1.jpg" alt="Image">
                </div>
            </div>
            <div class="col-md-4">
                <div class="task-title" onmouseover="moveSection(this)" onmouseout="resetSection(this)">
                    <h2>Gestion des tâches</h2>
                    <div class="task-description"> Gestion des tâches est dédiée à la planification, au suivi et à l'exécution des tâches.</div>
                    <a href="{{ route('register') }}" class="arrow-link">&#8250;</a>
                </div>
                <div class="task-title" onmouseover="moveSection(this)" onmouseout="resetSection(this)">
                    <h2> Les Projets</h2>
                    <div class="task-description"> Projet présente des détails sur un projet spécifique, y compris son objectif, son état d'avancement et d'autres informations pertinentes.</div>
                    <a href="{{ route('login') }}" class="arrow-link">&#8250;</a>
                </div>
                <div class="task-title" onmouseover="moveSection(this)" onmouseout="resetSection(this)">
                    <h2>Les taches</h2>
                    <div class="task-description"> Les taches contient une liste de tâches à accomplir, avec des détails sur leur priorité, leur état d'avancement et d'autres informations associées.</div>
                    <a href="{{ route('login') }}" class="arrow-link">&#8250;</a>
                </div>
                <!-- Ajoutez d'autres titres de gestion des tâches si nécessaire -->
            </div>
        </div>
    </div>
   
</body>

</html>
