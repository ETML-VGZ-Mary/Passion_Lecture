<?php

/*
 *  ETML
 *  Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
 *  Date          :	31.12.2023
 *  Description   :	Site web "Passion Lecture" en MVC. index.php appelle le bon controller.
 */

include_once "controller/Controller.php";
include_once "controller/ControllerDisplayPage.php";
include_once "controller/ControllerBook.php";


class MainController {

    /**
     * Permet de sélectionner le bon contrôler et l'action
     */
    public function dispatch() {

        // Si aucun controller, attribut celui par défaut (qui renvoie sur la page d'accueil)
        if (!isset($_GET['controller'])) {
            $_GET['controller'] = 'page';
            $_GET['action'] = 'home';
        }


        $currentLink = $this->menuSelected($_GET['controller']);
        $this->viewBuild($currentLink);
    }

    /**
     * Selectionner la page et instancier le contrôleur
     *
     * @param string $page : page sélectionner
     * @return $link : instanciation d'un contrôleur
     */
    protected function menuSelected ($controller) {

        switch($controller){
            case 'validation':
                $link = new ControllerBook();
                break;
            case 'page':
                $link = new ControllerDisplayPage();
                break;
            default:
                $link = new ControllerDisplayPage();
                break;
        }

        return $link;
    }

    /**
     * Construction de la page
     *
     * @param $currentPage : page qui doit s'afficher
     */
    protected function viewBuild($currentPage) {

        // sélectionne la bonne page à afficher
        $content = $currentPage->display();

        // construction de la page html/php/css
        include("../Passion_Lecture/view/head.inc.php");
        include("../Passion_Lecture/view/header.inc.php");
        echo $content;
        include("../Passion_Lecture/view/footer.inc.php");
    }
}


// Affichage du site web - appel du contrôleur par défaut
$controller = new MainController();
$controller->dispatch();