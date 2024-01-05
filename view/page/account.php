 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Page de compte d'un utilisateur. Affiche ses informations et liste les livres qu'il a ajoutés
-->

<?php
// connexion à la BD
//include("../../../Model/ModelBook.php");
//include("ModelAuthor.php");
//include("../Passion_Lecture/model/ModelAuthor.php");

//session_start();
?>

<div class="container">
    <h1>Informations du compte</h1>

    <form action="accountModify.php" method="post" id="accountDetail" enctype="multipart/form-data">
                
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
                <input class="bg-gray-300 hover:bg-gray-400 h-12 w-20" type="submit" name="btnSubmit" id="btnSubmit" value="Modifier">
            </div>
        </div>
    </form>
</div>
