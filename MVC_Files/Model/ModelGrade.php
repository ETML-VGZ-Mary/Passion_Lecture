<?php
 include_once("ModelMain.php");

Class ModelGrade extends ModelMain{
   

    /**
     * Fonction pour se connecter via PDO et utiliser la variable de classe $connector
     * Utilise un trycatch pour renvoyer une erreur dans la variable $e
     */
    public function __construct(){
        parent::__construct();
    }

    public function saveGrade($idUser, $idBook, $grade) {
        $query = "INSERT INTO t_grade (idUser, idBook, grade) VALUES (:idUser, :idBook, :grade)";
       
        $binds = [
            ['idUser', $idUser, PDO::PARAM_INT],
            ['idBook', $idBook, PDO::PARAM_INT],
            ['grade', $grade, PDO::PARAM_INT],
        ];

        // Appeler la méthode pour exécuter la requête
        $this->queryPrepareExecute($query, $binds);
    }
    

    public function getAverageGrade($idBook) {
        $query = "SELECT AVG(grade) AS averageGrade FROM t_grade WHERE idBook = :idBook";
        $binds = [
            ['idBook', $idBook, PDO::PARAM_INT],
        ];

        // Appeler la méthode pour exécuter la requête
        $result = $this->queryPrepareExecute($query, $binds);

        // Retourner la moyenne des notes (ou 0 si aucune note n'est disponible)
        return $result;
    }
}