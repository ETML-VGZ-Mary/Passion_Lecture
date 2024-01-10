<?php
/**
 * ETML
 * Auteur        : Déglise Camille - Vougaz Maryline - Wu Guo Yu
 * Date          : 28.11.2023
 * Description   : Controller qui gère l'affichage des pages-web demandées
 */

// Session Start
//session_start();
include_once 'model/ModelBook.php';
include("model/ModelAuthor.php");
include("model/ModelSearch.php");

class ControllerDisplayPage extends Controller {

    /**
     * Fonction qui appelle la bonne fonction selon l'[action] dans l'url
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action";

        // Appelle une méthode dans cette classe (ici, ce sera le nom + action (ex: listAction, detailAction, ...))
        return call_user_func(array($this, $action));

    }

    /**
     * Affiche le contenu de la page Home
     *
     * @return string
     */
    private function homeAction() {

        $dbBook = new ModelBook();
        $fiveLastBooks = $dbBook->getNLastBooks(5);

        $view = file_get_contents('view/page/home.php');
 
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
    /**
     * Affiche le contenu de la page bibliothèque
     *
     * @return string
     */
    private function listBookAction() {
        
        $modelSearch = new ModelSearch();
        $db2 = new ModelBook();
        $books = $db2->getAllBooks();
        $categories = $db2->getAllCategories();

        $view = file_get_contents('view/page/list.php');
 
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Affiche le contenu de la page ajouter un livre
     *
     * @return string
     */
    private function addBookAction() {

        $dbBook = new ModelBook();
        $categories = $dbBook->getAllCategories();

        if(!isset($_POST["title"])){
            $_POST["title"] = "";
        }
        if(!isset($_POST["nameAuthor"])){
            $_POST["nameAuthor"] = "";
        }
        if(!isset($_POST["firstNameAuthor"])){
            $_POST["firstNameAuthor"] = "";
        }
        if(!isset($_POST["category"])){
            $_POST["category"] = "";
        }
        if(!isset($_POST["nbPage"])){
            $_POST["nbPage"] = "";
        }
        if(!isset($_POST["editor"])){
            $_POST["editor"] = "";
        }
        if(!isset($_POST["yearEdit"])){
            $_POST["yearEdit"] = "";
        }
        if(!isset($_POST["bookExtract"])){
            $_POST["bookExtract"] = "";
        }
        if(!isset($_POST["resume"])){
            $_POST["resume"] = "";
        }

        $view = file_get_contents('view/page/addBook.php');
 
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Affiche le contenu de la page Informations de compte
     *
     * @return string
     */
    private function modifyBookAction() {

        $view = file_get_contents('view/page/modifyBook.php');
 
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Affiche le contenu de la page Informations de compte
     *
     * @return string
     */
    private function accountAction() {

        $view = file_get_contents('view/page/account.php');
 
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

     /**
     * Affiche le contenu de la page détails d'un livre
     *
     * @return string
     */
    private function detailsAction() {

        $db3 = new ModelBook();
        $oneBook = $db3->getOneBookGW($_GET["idBook"]);

        $view = file_get_contents('view/page/details.php');
 
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Affiche le contenu de la page nouveau compte
     *
     * @return string
     */
    private function newAccountAction() {

        $view = file_get_contents('view/page/accountSubscribe.php');
 
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
    

        /**
     * Check Form action
     *
     * @return string
     */
    private function checkAction() {

        $lastName = htmlspecialchars($_POST['lastName']);
        $firstName = htmlspecialchars($_POST['firstName']);
        $answer = htmlspecialchars($_POST['answer']);

        $view = file_get_contents('view/page/home/resume.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}