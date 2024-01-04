<?php
/**
 * ETML
 * Auteur        : Déglise Camille - Vougaz Maryline - Wu Guo Yu
 * Date          : 28.11.2023
 * Description   : Controller qui vérifie que les informations d'un livre soient valides (ajout et modification de livre).
 */

class ControllerBook extends Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action";

        return call_user_func(array($this, $action));
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function indexAction() {

        $view = file_get_contents('view/page/home/index.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Contact Action
     *
     * @return string
     */
    private function contactAction() {

        $view = file_get_contents('view/page/home/contact.php');


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