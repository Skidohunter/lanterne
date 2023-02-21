<?php
include_once('environnement.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/image/livre-de-sortileges.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lanterne</title>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <main id="home">
    <?php if (isset($_SESSION['userName'])) { ?>
            <h2>Bienvenue <?= $_SESSION['userName'] ?>
            <?php } else { ?>
                <h2>Bienvenue visiteur
                <?php } ?>
        <section id="main">
            <div id="divArticle">
                <article class="mainArticle">
                    <div class="mainDiv">
                        <h2>LANTERNE CHINOISE</h2>
                        <a href="chinoises.php">TOUT AFFICHER</a>
                        <img src="assets\image\téléchargement.jpg" alt="">
                    </div>
                </article>
                <article class="mainArticle">
                    <div class="mainDiv">
                        <h2>LANTERNE JAPONAISE</h2>
                        <a href="japonaises.php">TOUT AFFICHER</a>
                        <img src="assets\image\téléchargement (2).jpg" alt="">
                    </div>
                </article>
                <article class="mainArticle">
                    <div class="mainDiv">
                        <h2>LANTERNE PAPIER</h2>
                        <a href="papier.php">TOUT AFFICHER</a>
                        <img src="assets\image\téléchargement (1).jpg" alt="">
                    </div>
                </article>
            </div>
        </section>
    </main>
    <section id="histoire">
        <article>
            <div>
                <img src="assets\image\Dimension_bloga.webp" alt="">
            </div>
            <div class="txtHistoire">
                <h2>HISTOIRE DE LA LANTERNE CHINOISE</h2>
                <p>Les lanternes chinoises ont fait leur apparition pendant la Dynastie Han, et plus précisément pendant la Dynastie des Hans Orientaux (25-220). Les historiens pensent qu'elles étaient alors principalement utilisées en tant que lampes, bien avant l'invention de l'électricité ou l'utilisation du gaz.</p>
            </div>
        </article>
        <h2></h2>
    </section>
    <?php include_once('footer.php'); ?>
</body>

</html>