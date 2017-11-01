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
                <p>Les fonctionnalités ici présentes sont :
                    <li>La modification du profil aussi bien du côté admin que utilisateur lambda</li>
                <li>La demande d'inscription ou de la place qui peut être effectuée aussi bien du côté de l'admin que du côté de l'utilisateur</li>
                <li>Le listing des places de parking et des utilisateurs qui peuvent être modifiés ou banni par l'admin.</li>
                <li>Le schéma du parking qui permet dynamiquement de verrouiller une place à condition que celle-ci soit acceptée par l'admin</li>
                <li>Une vérification des champs lors de la saisie de mail ou de mot de passe dans l'espace profil.</li></p>
                <br>
                <p>De plus le site est entièrement accessible en local et permet une flexibilité par son design responsive.</p>
            </div>
            <hr>
            <div id="connexion">
                <h2>Connexion</h2>
                <p>Pour vous connecter, veuillez vous rendre sur la page d'accueil et cliquer sur le "cliquez-ici" situé en dessous du bouton "Demander une inscription".<br>
                   Ou alors vous pouvez vous rendre directement sur la page de connexion en >><a href="http://localhost/Projet-Parking/index.php?page=login" target="_blank">cliquant ici</a><<
                    </p>
                <br>
            </div>
            <div id="inscription">
                <h2>Inscription</h2>
                <p>Pour vous inscrire, veuillez vous rendre sur la page d'accueil et cliquer sur le bouton "Demander une inscription".<br>
                   Ou alors vous pouvez vous rendre directement sur la page d'inscription en >><a href="http://localhost/Projet-Parking/index.php?page=applyRegisterApp" target="_blank">cliquant ici</a><<
                    </p>
                <br>
            </div>
            <div id="deconnexion">
                <h2>Déconnexion</h2>
                <p>Pour vous déconnecter, cliquez sur le bouton déconnexion en haut à droite de votre écran.
                </p>
                <br>
                <img class="img-responsive img-thumbnail" src="<?= BASE_URL ?>/web/img/déconnexion.png">
            </div>
            <div id="modif_infos">
                <h2>Modifications infos personnelles</h2>
                <p>Vous pouvez modifier vos informations sur la page profil accessible depuis le bouton adjacent au bouton "Déconnexion" en haut à droite.
                <br>
                Ou cliquez simplement >><a href="http://localhost/Projet-Parking/index.php?page=applyRegisterApp" target="_blank">ici</a><<
                </p>
                <br>
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
                <li class="list-group-item"><a href="#connexion">Connexion</a></li>
                <li class="list-group-item"><a href="#inscription">Inscription</a></li>
                <li class="list-group-item"><a href="#deconnexion">Déconnexion</a></li>
                <li class="list-group-item"><a href="#modif_infos">Modifications infos personnelles</a></li>
            </ul>
        </div>
    </div>
</div>