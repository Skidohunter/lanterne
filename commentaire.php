<?php
include_once('environnement.php');
$articleId = $_GET['id'];
var_dump($articleId);
if (!isset($_SESSION['userName'])) {
    header('Location:index.php');
}

if (isset($_POST['autor']) && isset($_POST['commentaire']) && isset($_POST['note'])) {
    $autor = htmlspecialchars($_POST['autor']);
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $note = htmlspecialchars($_POST['note']);
   



    $request = $bdd->prepare('INSERT INTO commentaire (autor,commentaire,user_id,note,lanterne_id)
                              VALUES(?,?,?,?,?)');

    $request->execute(array($autor, $commentaire,$_SESSION['userId'],$note,$articleId));
    header('Location: index.php');
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/image/livre-de-sortileges.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Création de commentaire</title>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <main class='mainSpe'>
        <h1>Création du commentaire</h1>

        <!--Formulaire de Création-->
        <form action="commentaire.php?id=<?= $articleId?>" method="POST" enctype="multipart/form-data">
            <label for="autor">Le nom de l'utilisateur :</label>
            <input type="text" id="autor" name="autor">
            <label for="note">Votre note de l'article :</label>
            <input type="number" value="0" min="0" max="20" id="note" name="note">
            <label for="commentaire">Le commentaire :</label>
            <textarea name="commentaire" id="commentaire" cols=" 30" rows="10"></textarea>
            <button>Ajouter</button>
        </form>
    </main>
    <?php include_once('footer.php'); ?>
</body>

</html>