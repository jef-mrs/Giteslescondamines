<?php 

namespace App\Controller;

use Components\Controller\AbstractController;
use App\Manager\FlatManager;
class PagesController extends AbstractController {

    public function home() {
        // Récupération des données des logements
        $flatManager = new FlatManager();
        
        return $this->renderView('pages/home.php', ['flats' => $flatManager->findAll()]);
       
    }
}

?>