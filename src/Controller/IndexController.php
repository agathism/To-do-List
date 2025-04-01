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
        //Récupérer les tache
        $progs = $this->taskManager->getInProgressTasks();
        $pends = $this->taskManager->getPendingTasks();
        $comps = $this->taskManager->getCompletedTasks();
        //Afficher les tâches dans le template
        require_once("./templates/index_admin.php");
    }

    // Route DetailAnimal -> URL: index.php?action=detail&id=10 
    public function detailTask(int $id)
    {
        //Récupérer la tâche
        $task = $this->taskManager->selectByID($id);
        if ($task != false) {
            //Afficher la tâche dans le template
            require_once("./templates/task_detail.php");
        } else {
            header("Location: index_admin.php");
            exit();
        }
    }
}
