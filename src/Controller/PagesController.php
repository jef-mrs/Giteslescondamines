<?php 

namespace App\Controller;

use Components\Controller\AbstractController;

class PagesController extends AbstractController {

    public function home() {
        
        $this->renderView('pages/home.php', ['title' => 'home']);
       
    }
}

?>