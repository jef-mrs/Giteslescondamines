<?php 

namespace App\Controller;

use Components\Controller\AbstractController;

class PagesController extends AbstractController {

    public function home() {
        return $this->renderView('pages/home.php', ['title' => 'Home Page']);
    }
}

?>