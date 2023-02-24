<?php
include_once('environnement.php');
if ( isset($_SESSION['userName']) || ($_SESSION['role'] == 'admin')){

if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
    $type_id = ($_POST['type']);
    
    
   

    // var_dump($_FILES['image']);

    if (isset($_FILES['image'])) {
        // NOM DU FICHIER IMAGE
        $image = $_FILES['image']['name'];
        // NOM TEMPORAIRE DU FICHIER IMAGE
        $imageTmp = $_FILES['image']['tmp_name'];
        $infoImage = pathinfo($image);//TABLEAU QUI DECORTIQUE LE NOM DU FICHIER
        $extImage = $infoImage ['extension']; //EXTENSION
        $imageName = $infoImage['filename'];//NOM DU FICHIER SANS L'EXTENSION
        //GENERATION D'UN NOM DE FICHIER UNIQUE
        $uniqueName = $imageName .time() .rand(1,1000) .".".$extImage;

        move_uploaded_file($imageTmp, 'assets/image/lanterne/' . $uniqueName);
    }                       
    $request = $bdd->prepare('INSERT INTO lanterne(name,image,type_id)
                              VALUES(?,?,?)');

    $request->execute(array($name, $uniqueName,$type_id));

    header('Location: index.php');
}}else{
    echo "Connectez vous pour créer une lanterne";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Création de lanterne</title>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <main class='mainSpe'>
        <h1>Création de lanterne</h1>

        <!--Formulaire de Création-->
        <form action="creation.php" method="POST" enctype="multipart/form-data">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name">

            <label for="image">Ajouter une image:</label>
            <input type="file" id="image" name="image">

            <select name="type">
            <option value="0" selected>Type</option>
            <option value="1">chinoises</option>
            <option value="2">japonaises</option>
            <option value="3">papier</option>
            </select>    
            <button>Ajouter</button>
        </form>
    </main>
    <?php include_once('footer.php'); ?>
</body>

</html>