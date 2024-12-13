<?php 

namespace App\Controller;

use Components\Controller\AbstractController;
use App\Manager\FlatManager;
class PagesController extends AbstractController {

    public function home() {
        // Récupération des données des logements
        $flatManager = new FlatManager();
        $flats = $flatManager->findAll();
        
        return $this->renderView('pages/home.php', ['title' => 'Homepage', 'flats' => $flats]);
       
    }
}

?>