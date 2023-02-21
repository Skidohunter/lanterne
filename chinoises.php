<?php
include_once('environnement.php');

$request = $bdd->query('SELECT * FROM lanterne
                        INNER JOIN types ON type_id = types.id
                        WHERE types.id = 1
                        ');
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
    <main id="lanterne">
        <h1>Référencement des lanternes</h1>    
        <h2>Lanternes chinoises :</h2>
        <section id="lanternes_list">
            <!-- BOUCLE POUR RECUPERATION DE LA REQUETE -->
            <?php while ($lanterne = $request->fetch()) : ?>
                <?php
                // var_dump($creature)
                ?>
                <article class='lanterneArticle'>
                    <img class='imgArticle' src="assets/image/lanterne-chinoise/<?= $lanterne['image']; ?>" alt="image de <?= $lanterne['name']; ?>">
                    <h3> <?= $lanterne['name']; ?> </h3>
                </article>
            <?php endwhile ?>
        </section>
    </main>
    <?php include_once('footer.php'); ?>
</body>

</html>