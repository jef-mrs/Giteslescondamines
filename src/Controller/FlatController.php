<?php 

namespace App\Controller;
use Components\Controller\AbstractController;
use App\Model\Flat;
use App\Manager\FlatManager;

class FlatController extends AbstractController {

    public function new() {
        $this->renderView('flats/new.php', ['title' => 'Nouvelle maison']);
    }

    public function create() {
        // Create new flat in database
        // Redirect to home page
        if (!empty($_POST )) {
            $flat = new Flat();
            $flatManager = new FlatManager();
            $flat->setName($_POST['name']);
            $flat->setDescription($_POST['description']);
            var_dump($flat);

            $flatManager->add($flat);

            $this->redirectToRoute('/', ['response' => 'Logement créée avec succès']);

        }
        $this->redirectToRoute('/');
    }
}

?>