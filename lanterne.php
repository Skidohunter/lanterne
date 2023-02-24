<?php
include_once('environnement.php');

//REQUETE SELECT POUR REMPLISSAGE AUTO
$articleId = $_GET['id'];




$rqSelect = $bdd->prepare('SELECT * 
                        FROM lanterne
                        WHERE id = ?
                        ');
$rqSelect->execute(array($articleId));


$request = $bdd->prepare('SELECT * FROM commentaire
                        INNER JOIN lanterne ON lanterne_id = lanterne.id
                        WHERE lanterne.id = ?
                        ');

$request->execute(array($articleId));

$rqNote = $bdd->prepare('SELECT AVG(note) as note
                        FROM commentaire
                        INNER JOIN lanterne ON lanterne_id = lanterne.id
                        WHERE lanterne_id = ?
                        

                        ');

$rqNote->execute(array($articleId));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>lanterne détails</title>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <main id="lanterneSoloMain">
        <h1>Lanterne</h1>
        <section id="lanterneSoloSection">
            <?php while ($articleId = $rqSelect->fetch()) : ?>
            <article id='lanterneSolo'>
                <img class='imgArticle' src="assets/image/lanterne/<?= $articleId['image']; ?>" alt="image de <?= $articleId['name']; ?>">
                <h3><?= $articleId['name']; ?> </h3>
                <a href=<?= 'commentaire.php?id=' . $articleId['id']; ?>>Ecrire commentaire</a>   
            <?php endwhile ?>
            <div id="btnD">Commentaires</div>
            <div id='dNone' class="dNone">
                <?php while ($commentaire = $request->fetch()) :?>
                            <div id='commentaire'>
                                <p><?= 'Auteur : '.$commentaire['autor']; ?> </p>
                                <p><?= 'Note : '.$commentaire['note']; ?> </p>
                                <p><?= $commentaire['commentaire']; ?> </p>
                            </div>            
                <?php endwhile ?>
            </div>
            <?php while ($note = $rqNote->fetch()) :?>
                            <div>        
                            <p><?= 'Note : '.round($note['note']); ?> </p>
                            </div>            
                <?php endwhile ?>
            </article>
        </section>    
    </main>
    <?php include_once('footer.php'); ?>
</body>
<script src="assets/js/script.js"></script>
</html>