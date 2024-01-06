<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/app.css">
    <link href="../CSS/app.css" rel="stylesheet" media="screen"/>
    <title>Ajouter un livre</title>
</head>
<?php include ('header.inc.php');?>
<body>
    <h1>Ajouter un livre</h1>

    <form action="dispatch.php?controler=book&action=add" method="post" class="book"  id="formAddBook" enctype="multipart/form-data">
                
                <p>
                    <label for="title" >Titre :</label>
                    <input type="text" name="title" id="title" value="">
                </p>
                <p>
                    <label for="nameAuthor" >Nom auteur :</label>
                    <input type="text" name="nameAuthor" id="nameAuthor" value="">
                <p>
                    <label for="firstNameAuthor"> Prénom auteur :</label>
                    <input type="text" name="firstNameAuthor" id="firstNameAuthor" value="">
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
                    <input type="number" name="nbPage" id="nbPage" min ="1">
                </p>
                
                <p>
                    <label for="editor">Editeur :</label>
                    <input type="text" name="editor" id="editor" value="">
                </p>
                <p>
                    <label for="yearEdit">Année d'édition :</label>
                    <input type="text" name="yearEdit" id="yearEdit" value="">
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
                    <textarea name="resume" id="resume" cols="30" rows="10"></textarea>
                </p>
                <p>
                    <input type="submit" name="btnSubmit" value="Ajouter">
                </p>
            </form>

</body>
<?php include ('footer.inc.php');?>
</html>