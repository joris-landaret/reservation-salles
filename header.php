<header>
        <div>
            <img src="img/rainbow_mountain.jpg" alt="">
            <h1>Salle à louer</h1>
        </div>

        <div class="liste">
            <ul>
                <li><a href="http://reservationsalles/">Accueil</a></li>
                <?php if (!empty($_SESSION['login'])): ?>
                <li><a href="http://reservationsalles/profil.php">Profil</a></li>
                <li><a href="http://reservationsalles/deconnexion.php">Se déconnecter</a></li>
                <li><a href="http://reservationsalles/commentaire">Commentaire</a></li>
                <?php else: ?>
                <li><a href="http://reservationsalles/connexion.php">Connexion</a></li>
                <li><a href="http://reservationsalles/inscription.php">Inscription</a></li>
                <?php endif; ?>
                <li><a href="http://reservationsalles/reservation-form.php">Réservation</a></li>
            </ul>
        </div>

    </header>