<?php
    include("../../../Model/ModelBook.php");
    include("../../../Model/ModelAuthor.php");

    $idBook = $_POST["idBook"];

    $db3 = new ModelBook();
    $oneBook = $db3->getOneBook($idBook); // id entrée en "dure"
    $cat = $cat->getOneCat($oneBook["idCategory"]);

    $db4 = new ModelAuthor();
    $auteur = $auteur->getOneAuthor($oneBook["idBook"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/app.css">
    <link href="../CSS/app.css" rel="stylesheet" media="screen"/>
    <title>Modifier un livre</title>
</head>
<?php include ('header.inc.php');?>
<body>
<h1>Modifier un livre</h1>

<form action="dispatchphp?controler=book&action=modify" method="post" class="book"  id="formmodifyBook" enctype="multipart/form-data">

<p>
    <label for="title" >Titre :</label>
    <input type="text" name="title" id="title" value="<?=$oneBook["title"]?>">
</p>
<p>
    <label for="nameAuthor" >Nom auteur :</label>
    <input type="text" name="nameAuthor" id="nameAuthor" value="<?=$auteur["lastName"]?>">
<p>
    <label for="firstNameAuthor"> Prénom auteur :</label>
    <input type="text" name="firstNameAuthor" id="firstNameAuthor" value= "<?=$auteur["firstName"]?>" >
</p>
    
</p>
<p> <!-- UTILISER LA METHODE APPROPRIÉE POUR LA LISTE DES CATEGORIES-->
    <label  for="category">Catégories :</label>
    <select name="category" id="category">
        <option value=""></option>
        <option value="romance">Romance</option>
        <option value="horror">Horreur</option>
        <option value="fantasy">Fantaisie</option>
    </select>
</p>
<p>
    <label for="nbPage">Nombres de pages :</label> 
    <input type="number" name="nbPage" id="nbPage" min ="1" value="<?=$oneBook["nbPage"]?>">
</p>

<p>
    <label for="editor">Editeur :</label>
    <input type="text" name="editor" id="editor" value= "<?=$oneBook["editor"]?>">
</p>
<p>
    <label for="yearEdit">Année d'édition :</label>
    <input type="text" name="yearEdit" id="yearEdit" value= "<?=$oneBook["yearEdit"]?>">
</p>
<p>
    <label for="pictureCover">Couverture :</label>
    <input type="file" name="pictureCover" id="pictureCover" value="Charger un fichier .png"/>
</p>
<p>
    <label for="bookExtract">Extrait du livre :</label>
    <input type="text" name="bookExtract" id="bookExtract" value="Lien URL vers un extrait">
</p>
<p>
    <label for="resume">Résumé :</label>
    <textarea name="resume" id="resume" cols="30" rows="10" value= "<?=$oneBook["resume"]?>"></textarea>
</p>
<p>
    <input type="submit" name="btnSubmit" value="Modifier">
</p>
</form>

</body>
<?php include ('footer.inc.php');?>
</html>