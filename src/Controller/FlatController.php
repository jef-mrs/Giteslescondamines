<?php 

namespace App\Controller;
use Components\Controller\AbstractController;
use App\Model\Flat;
use App\Manager\FlatManager;

class FlatController extends AbstractController {

    public function new() {
       return $this->renderView('flats/new.php', ['title' => 'Nouvelle maison']);
    }

    public function create() {
        // Create new flat in database
        // Redirect to home page
        if (!empty($_POST )) {
            $flat = new Flat();
            $flatManager = new FlatManager();
            $flat->setName($_POST['name']);
            $flat->setDescription($_POST['description']);
            if($flatManager->add($flat)){

                return $this->redirectToRoute('/', ['reponse' => 'Logement créée avec succès']);
            }

        }
        
        return $this->renderView('flats/new.php', ['title' => 'Nouvelle maison']);
    }
}

?>