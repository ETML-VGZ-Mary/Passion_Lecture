 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Accueil du site "Passion Lecture" 
-->

<?php
// Modeles
include("model/ModelBook.php");
include("model/ModelAuthor.php");
$dbBook = new ModelBook();
$categories = $dbBook->getAllCategories();
?>

<div class="container">
    <h1 class="">Ajouter un livre</h1>

    <form action="index.php?controller=validation&action=addBook" method="post" class="book"  id="formAddBook" enctype="multipart/form-data">
                
        <div class="form-data">
            <label class="accountMetaData" for="title" >Titre :</label>
            <input type="text" name="title" id="title" value="<?=$_POST["title"]?>">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="nameAuthor" >Nom auteur :</label>
            <input type="text" name="nameAuthor" id="nameAuthor" value="<?=$_POST["nameAuthor"]?>">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="firstNameAuthor"> Prénom auteur :</label>
            <input type="text" name="firstNameAuthor" id="firstNameAuthor" value="<?=$_POST["firstNameAuthor"]?>">
        </div>
            
        
        <div class="form-data">
            <label class="accountMetaData" for="category">Catégories :</label>
            <select name="category" id="category">
                <option value="" hidden></option>
                <?php
                    foreach($categories as $category){
                        
                        if ($category["label"] == $_POST["category"]){
                            echo "<option value=\"" . $category["label"] . "\" selected> ". $category["label"] . "</option>";
                        }else{
                            echo "<option value=\"" . $category["label"] . "\"> ". $category["label"] . "</option>";
                        }
                        
                    }
                ?>
            </select>
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="nbPage">Nombres de pages :</label> 
            <input type="number" name="nbPage" id="nbPage" min ="1" value="<?=$_POST["nbPage"]?>">
        </div>
        
        <div class="form-data">
            <label class="accountMetaData" for="editor">Editeur :</label>
            <input type="text" name="editor" id="editor" value="<?=$_POST["editor"]?>">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="yearEdit">Année d'édition :</label>
            <input type="text" name="yearEdit" id="yearEdit" value="<?=$_POST["yearEdit"]?>">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="pictureCover">Couverture :</label>
            <input type="file" name="pictureCover" id="pictureCover" value="Charger un fichier .png"/>
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="bookExtract">Extrait du livre :</label>
            <input type="text" name="bookExtract" id="bookExtract" placeholder="Lien URL vers un extrait" value="<?=$_POST["bookExtract"]?>">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="resume">Résumé :</label>
            <textarea name="resume" id="resume" cols="30" rows="10"><?=$_POST["resume"]?></textarea>
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="btnSubmit"></label>
            <div class="btnContainer">
                <button class="bg-gray-300 hover:bg-gray-400 h-12 w-250" type="submit" name="btnSubmit" id="btnSubmit">Ajouter</button>
            </div>
        </div>
    </form>
</div>
