<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <div id="presentation">
                <h2>Présentation</h2>
                <p>Afin d’éviter le stationnement sauvage dans le labyrinthe qu’est le parking, il a été décidé d’attribuer à chaque membre qui le demandait une place de parking numérotée.</p>
            </div>
            <hr>
            <div id="architecture">
                <h2>Architecture</h2>
                <p>L'architecture utilisée ici est l'architecture MVC, elle nous a permit d'organiser plus facilement notre code afin qu'il soit plus lisible pour nous ou tout autre développeur. La création de page suit un cheminement simple
                    <li>L'ajout d'un use dans le controlleur</li>
                <li>L'ajout d'une condition dans l'initialisation du controlleur</li>
                <li>La création de la classe</li>
                <li>La création de la page en HTML / CSS / JS</li></p>
            </div>
            <hr>
            <div id="requetes">
                <h2>Requêtes et espace de travail</h2>
                <p>Les requêtes se font en général dans le dossier model, néanmoins à défaut d'avoir le temps, ou pour tester rapidement les requêtes, nous avons effectuer certaines d'entre elles dans le controlleur en appelant uniquement l'objet du modèle.</p>
            </div>
            <hr>
            <div id="fonctions">
                <h2>Fonctionnalités</h2>
                <p>Les fonctionnalités ici présentent sont :
                    <li>La modification du profil aussi bien du côté admin que utilisateur lambda</li>
                <li>La demande d'inscription ou de la place qui peut être effectuée aussi bien du côté de l'admin que du côté de l'utilisateur</li>
                <li>Le listing des places de parking et des utilisateurs qui peuvent être modifiés ou banni par l'admin.</li>
                <li>Le schéma du parking qui permet dynamiquement de verrouiller une place à condition que celle-ci soit acceptée par l'admin</li>
                <li>Une vérification des champs lors de la saisie de mail ou de mot de passe dans l'espace profil.</li></p>
                <br>
                <p>De plus le site est entièrement accessible en local et permet une flexibilité par son design responsive.</p>
            </div>

        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item"><a href="#presentation">Présentation du projet</a></li>
                <li class="list-group-item"><a href="#architecture">Architecture</a></li>
                <li class="list-group-item"><a href="#requetes">Requêtes et espace de travail</a></li>
                <li class="list-group-item"><a href="#fonctions">Fonctionnalités</a></li>
                <li class="list-group-item"><a href="#mdp"><small style="padding-left: 10px;">Gestion des mots de passe</small></a></li>
                <li class="list-group-item"><a href="#user"><small style="padding-left: 10px;">Espace utilisateur</small></a></li>
                <li class="list-group-item"><a href="#admin"><small style="padding-left: 10px;">Espace administrateur</small></a></li>
                <li class="list-group-item"><a href="#local"><small style="padding-left: 10px;">Accès depuis le réseau local</small></a></li>
            </ul>
        </div>
    </div>
</div>