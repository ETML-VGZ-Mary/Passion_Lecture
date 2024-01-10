 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Page de modification d'un livre
-->

<?php
// Modeles
include("model/ModelBook.php");
include("model/ModelAuthor.php");
$dbBook = new ModelBook();
$categories = $dbBook->getAllCategories();
$oneBook = $dbBook->getOneBookGW($_GET["idBook"]);
?>

<div class="container">
    <h1 class="">Modifier un livre</h1>

    <form action="index.php?controller=validation&action=addBook" method="post" class="book"  id="formAddBook" enctype="multipart/form-data">
                
        <div class="form-data">
            <label class="accountMetaData" for="title" >Titre :</label>
            <input type="text" name="title" id="title" value="<?=$oneBook["title"]?>">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="nameAuthor" >Nom auteur :</label>
            <input type="text" name="nameAuthor" id="nameAuthor" value="">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="firstNameAuthor"> Prénom auteur :</label>
            <input type="text" name="firstNameAuthor" id="firstNameAuthor" value="">
        </div>
            
        
        <div class="form-data">
            <label class="accountMetaData" for="category">Catégories :</label>
            <select name="category" id="category">
                <option value="" hidden></option>
                <?php
                    foreach($categories as $category){
                        
                        if ($category["idCategory"] == $oneBook["idCategory"]){
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
            <input type="number" name="nbPage" id="nbPage" min ="1" value="<?=$oneBook["nbPage"]?>">
        </div>
        
        <div class="form-data">
            <label class="accountMetaData" for="editor">Editeur :</label>
            <input type="text" name="editor" id="editor" value="<?=$oneBook["editor"]?>">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="yearEdit">Année d'édition :</label>
            <input type="text" name="yearEdit" id="yearEdit" value="<?=$oneBook["yearEdit"]?>">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="pictureCover">Couverture :</label>
            <input type="file" name="pictureCover" id="pictureCover" value="Charger un fichier .png"/>
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="bookExtract">Extrait du livre :</label>
            <input type="text" name="bookExtract" id="bookExtract" placeholder="Lien URL vers un extrait" value="">
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="resume">Résumé :</label>
            <textarea name="resume" id="resume" cols="30" rows="10"><?=$oneBook["resume"]?></textarea>
        </div>
        <div class="form-data">
            <label class="accountMetaData" for="btnSubmit"></label>
            <div class="btnContainer">
                <button class="bg-gray-300 hover:bg-gray-400 h-12 w-250" type="submit" name="btnSubmit" id="btnSubmit">Modifier</button>
            </div>
        </div>
    </form>
</div>
