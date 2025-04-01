<?php

namespace App\Controller;

use App\Manager\TaskManager;
use App\Model\Task;

//
/**
 * AdminController
 * Contient les routes pour gérer les tâches en tant qu'admin
 */
class AdminController
{

    private TaskManager $taskManager;

    public function __construct()
    {
        $this->taskManager = new TaskManager();
    }

    // Route DashboardAdmin ( ancien admin.php ) 
    // URL : index.php?action=admin
    public function dashboardAdmin()
    {
        //Récuperer les tâches
        $progs = $this->taskManager->getInProgressTasks();
        $pends = $this->taskManager->getPendingTasks();
        $comps = $this->taskManager->getCompletedTasks();
        //Afficher les voitures dans la template
        require_once("./templates/index_admin.php");
    }

    // Route DashboardAdmin ( ancien add.php ) 
    // URL : index.php?action=add
    public function addTask()
    {
        $errors = [];
        // Si le formulaire est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = $this->validatetaskForm($errors, $_POST);

            if (empty($errors)) {
                //Instancier une objet task avec le sdonnées du formulaire
                $task = new Task(null, $_POST["title"], $_POST["description"], $_POST["category"], $_POST["status"], $_POST["created_at"], $_POST["priority"], $_POST["due_date"]);
                // Ajouter la voiture en BDD  et rediriger
                $taskManager = new TaskManager();
                $taskManager->insert($task);
                $this->dashboardAdmin();
                exit();
            }
        }
        require_once("./templates/task_insert.php");
    }

    // Route Edittask ( ancien update.php ) 
    // URL : index.php?action=edit&id=1
    public function editTask(int $id)
    {
        $task = $this->taskManager->selectByID($id); // Un seul connect DB par page

        //Vérifier si la voiture avec l'ID existe en BDD
        if (!$task) {
            header("Location: index.php?action=admin");
            exit();
        }

        $errors = [];
        // Si le formulaire est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Vérifier les champs du formulaire
            $errors = $this->validateTaskForm($errors, $_POST);
            // Si le formulaire n'a pas renvoyé d'erreurs
            if (empty($errors)) {

                // Mettre à jour la voiture $task et rediriger
                $task->setTitle($_POST["title"]);
                $task->setDescription($_POST["description"]);
                $task->setStatus($_POST["status"]);
                $task->setPriority($_POST["priority"]);

                $this->taskManager->update($task);

                header("Location: index.php?action=admin");
                exit();
            }
        }
        require_once("./templates/task_update.php");
    }
    // Route Delete ( ancien delete.php ) 
    // URL : index.php?action=delete&id=1
    public function deleteTask(int $id)
    {
        $task = $this->taskManager->selectByID($id);

        //Vérifier si la voiture avec l'ID existe en BDD
        if (!$task) {

            header("Location: index.php?action=admin");
            exit();
        }

        //Si le form est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Supprimer la voiture et rediriger
            $this->taskManager->deleteByID($task->getId());

            header("Location: index.php?action=admin");
            exit();
        }

        require_once("./templates/task_delete.php");
    }


    public function validateTaskForm(array $errors, array $taskForm): array
    {
        if (empty($taskForm["title"])) {
            $errors["title"] = "le titre de la tâche est manquant";
        }
        if (empty($taskForm["description"])) {
            $errors["description"] = "la description de la tâche est manquante";
        }
        if (empty($taskForm["status"])) {
            $errors["status"] = "le statut de la tâche est manquante";
        }
        if (empty($taskForm["priority"])) {
            $errors["category"] = "la priorité de la tâche est manquante";
        }
        //Démo class taskFormValidator
        return $errors;
    }
}