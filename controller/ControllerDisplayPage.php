<?php
/**
 * ETML
 * Auteur        : Déglise Camille - Vougaz Maryline - Wu Guo Yu
 * Date          : 28.11.2023
 * Description   : Controller qui gère l'affichage des pages-web demandées
 */

// Session Start
session_start();

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