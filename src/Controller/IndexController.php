<?php

namespace App\Controller;

use App\Manager\TaskManager;

/**
 * IndexController
 * Contient les routes accessibles par les visiteurs, page accueil, détail
 */
class IndexController
{

    private TaskManager $taskManager;

    public function __construct()
    {
        // Quand on crée un IndexController
        // Il contiendra automatiquement un TaskManager
        // Utilisable avec $this->TaskManager
        $this->taskManager = new TaskManager();
    }

    // Route HomePage -> URL : index.php
    public function homePage()
    {
        //Récupérer les animaux
        $animals = $this->taskManager->selectAll();
        //Afficher les animaux dans le template
        require_once("./templates/index_task.php");
    }

    // Route DetailAnimal -> URL: index.php?action=detail&id=10 
    public function detailTask(int $id)
    {
        //Récupérer l'animal
        $animal = $this->taskManager->selectByID($id);
        if ($animal != false) {
            //Afficher l'animal dans le template
            require_once("./templates/task_detail.php");
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
