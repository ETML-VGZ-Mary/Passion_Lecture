<?php

/**
 * ETML
 * Auteur           : Déglise Camille - Vougaz Maryline - Wu Guo Yu
 * Date             : 06.12.2023
 * Description      : Class DataBase : connexion à la BD, requêtes MySQL, query, prepare
 */


 class ModelMain {

    // Variable de classe
    protected $connector;

    /**
     * Méthode de création d'un objet PDO et se connecter à la BD
     */
    public function __construct() {
        try
        {
            // depuis Docker
            $this->connector = new PDO('mysql:host=localhost:6033;dbname=db_passion;charset=utf8' , 'root', 'root');
            
            // depuis UWAMP
            //$this->connector = new PDO('mysql:host=localhost:3306;dbname=db_passion;charset=utf8' , 'root', 'root');
        
            // depuis UWAMP (version Sébeillon)
            //$this->connector = new PDO('mysql:host=localhost;dbname=db_passion;charset=utf8' , 'root', 'root');
        

        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }


    /**
     * Méthode qui exécute une simple requête mySQL
     */
    protected function querySimpleExecute($query){

        // permet de préparer et d’exécuter une requête de type simple (sans where)
        $req = $this->connector->query($query);
        return $req;
    }

    /**
     * Méthode prepare, execution d'une requête de manière sécurisée
     */
    protected function queryPrepareExecute($query, $binds){
        
        // TODO: permet de préparer, de binder et d’exécuter une requête (select avec where ou insert, update et delete)
        /**
         * A COMPLETER PLUS TARD 
         */
        $req = $this->connector->prepare($query);
        foreach($binds as $bind) {
            $req -> bindValue($bind[0], $bind[1], $bind[2]);
        }
        $req -> execute();
        return $req;
    }

    /**
     * TODO: à compléter
     */
    protected function formatData($req){

        // TODO: traiter les données pour les retourner par exemple en tableau associatif (avec PDO::FETCH_ASSOC)
        $result = $req->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * TODO: à compléter
     */
    protected function unsetData($req){

        // TODO: vider le jeu d’enregistrement
        $req->closeCursor();
    }

 }


?>