<?php
include_once("ModelMain.php");

Class ModelAuthor extends ModelMain {


    // Variable de classe
    //private $connector;

    /**
     * Fonction pour se connecter via PDO et utiliser la variable de classe $connector
     * Utilise un trycatch pour renvoyer une erreur dans la variable $e
     */
    public function __construct(){
        parent::__construct();
        //$this->__construct();
    }

    

    /**
     * Méthode pour récupérer la liste de tous les auteurs de la DB
     */
    public function getAllAuthors()
    {
        // Récupère les données sur la table auteur avec une requête sql
        $query = "SELECT * FROM t_author;";

        //appeler la méthode pour executer la requête
        $req = $this->querySimpleExecute($query);

        //Retourne dans un tableau les données des auteurs
        $authors = $this->formatData($req);
        
        return $authors;

    }

    /**
     * Méthode qui récupère la liste des informations pour 1 livre
     * Prend en argument l'ID du livre
     * Doit être associée à un $_POST dans la page concernée
     * Utilisée dans la page "Détail d'un livre"
     */
    public function getOneAuthor($id){
        // Récupère les données sur la table auteur avec une requête sql
        // en utilisant son ID
        $query = "SELECT * FROM t_author WHERE idAuthor= :id"; 
        $binds = [
            ['id', $id, PDO::PARAM_INT]
        ];

        //appeler la méthode pour executer la requête
        $req = $this->queryPrepareExecute($query,$binds);

        //Retourne dans un tableau associatif à une seule 
        //entrée les données d'un auteur
        $author =$this->formatData($req);
        
        //Retourne la première (et unique) entrée du tableau
        return $author[0];
    }


    /**
     * Méthode pour ajouter un auteur dans la base de données
     * Prend en argument les données entrées par l'utilisateur
     */

     public function addAuthor($datas)
     {
        //Ajout des données de $_POST dans de nouvelles variables
        $firstName = $datas["firstNameAuthor"];
        $lastName = $datas["nameAuthor"];

        //Requête sur la db pour ajout avec un prepare
        $query = "INSERT INTO t_author(firstName, lastName)
        VALUES (:firstName, :lastName)";

        $binds = [
            ['firstName', $firstName, PDO::PARAM_STR],
            ['lastName', $lastName, PDO::PARAM_STR]
        ];
        $this->queryPrepareExecute($query, $binds);

     }

     //Nouvelle méthode pour getNameAuthor($nom, $prenom)
     //{
        //select * t author like nom et prénom
     //}
     
    

}
   

?>


