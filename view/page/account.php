 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Accueil du site "Passion Lecture" 
-->

<?php
// connexion à la BD
include("../../../Model/ModelBook.php");
include("../../../Model/ModelAuthor.php");

$db3 = new ModelBook();
$oneBook = $db3->getOneBookGW(2); // id entrée en "dure"
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/app.css">
    <link href="../CSS/app.css" rel="stylesheet" media="screen"/>
    <title>Ajouter un livre</title>
</head>
<body>
    <header>
        <?php
            include("header.inc.php");
        ?>
    </header>
    <div class="container">
        <h1>Informations du compte</h1>

        <form action="../PHP_html/accountModify.php" method="post" id="accountDetail" enctype="multipart/form-data">
                    
            <div class="form-data">
                <label class="accountMetaData" for="accountLogin" >Identifiant :</label>
                <label class="accountData" for="accountLogin" ><?=$_SESSION["account"]["login"]?></label>
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountLastName" >Nom :</label>
                <label class="accountData" for="title" ><?=$_SESSION["account"]["lastName"]?></label>
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountFirstName"> Prénom :</label>
                <label class="accountData" for="title" ><?=$_SESSION["account"]["firstName"]?></label>
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="accountEmail">Adresse E-mail :</label> 
                <label class="accountData" for="accountEmail" ><?=$_SESSION["account"]["mailAddress"]?></label>
            </div>
            
            <div class="form-data">
                <label class="accountMetaData" for="accountBirthDate">Date de naissance :</label>
                <label class="accountData" for="accountBirthDate" ><?=$_SESSION["account"]["birthDate"]?></label>
            </div>
            <div class="form-data">
                <label class="accountMetaData" for="btnSubmit"></label>
                <div class="endForm">
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Modifier">
                </div>
            </div>
        </form>
    </div>
    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>
</body>
</html>