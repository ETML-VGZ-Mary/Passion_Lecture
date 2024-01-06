<?php 

// dispatch.php?controler=book&action=add

//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";

//echo "<pre>";
//var_dump($_GET);
//echo "</pre>";

// Il faut ajouter le controller-BOOK pour l'instancier
include ('../../../Controller/ControllerBook.php');

$data = $_POST;


$controler = $_GET["controler"];
$action = $_GET["action"];

if ($controler === "book") {
  $controlerBook = new ControllerBook();

  if ($action === "add") {
    $controlerBook->addBook($data);

  }
    
    /*
    if ($action === "update") {
        $controlerBook->updateBook($data);
    }
    */
}
/*
if ($controler === "user") {

     instancier le user

    if ($action === "add") {

         appeler la bonne méthode du controlleur user
        $controlerBook->addBook($data);
    }
}
*/
