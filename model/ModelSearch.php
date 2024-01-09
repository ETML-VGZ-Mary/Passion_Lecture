<?php
 include_once("ModelMain.php");

Class ModelSearch extends ModelMain{
   

    /**
     * Fonction pour se connecter via PDO et utiliser la variable de classe $connector
     * Utilise un trycatch pour renvoyer une erreur dans la variable $e
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Méthode pour récupérer la recherche de l'utilisateur dans la bibliothèque
     */

     public function searchBook($query)
     {
        
        //Requête préparée pour éviter injections SQL
        $searchQuery = "SELECT * from t_book 
                    WHERE  title LIKE '%$query%'";
       // echo "<pre>";
        //var_dump($searchQuery);
        //echo "</pre>";
        //$binds = [
            //[
                //':searchQuery', $searchQuery, PDO::PARAM_STR
            //]
        //];  

        // Appeler la méthode pour exécuter la requête
        // $req = $this->queryPrepareExecute($query, $binds);
        $req = $this->querySimpleExecute($searchQuery);
        // Retourner les résultats sous forme de tableau associatif
        $books =  $this->formatData($req);
        //echo "<pre>";
        //var_dump($books);
        //echo "</pre>";
        return $books;
        
     }

}