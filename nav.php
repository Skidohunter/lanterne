<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="chinoises.php">Lanterne Chinoises</a></li>
        <li><a href="japonaises.php">Lanterne Japonaise</a></li>
        <li><a href="papier.php">Lanterne Papier</a></li>
        <?php if (!isset($_SESSION['userName'])) { ?>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
        <?php } else { ?>
            <li><a href="deconnexion.php">Deconnexion</a></li>
        <?php } ?>
    </ul>
</nav>