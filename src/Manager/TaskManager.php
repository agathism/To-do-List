<?php

namespace App\Manager;

use App\Model\Task;

class TaskManager extends DatabaseManager
{

    // public function selectAll(): array
    // {
    //     //Récupération de la connexion PDO et requête SQL
    //     $requete = self::getConnexion()->prepare("SELECT * FROM tasks;");
    //     $requete->execute();
    //     $arrayTasks = $requete->fetchAll();
    //     //Créer un tableau qui contiendra les objets tâches
    //     $tasks = [];
    //     foreach ($arrayTasks as $arrayTask) {
    //         //Istantiation d'un objet Task avec les données du tableau associatif  
    //         $tasks[] = new Task(
    //         $arrayTask["ID"], 
    //         $arrayTask["title"], 
    //         $arrayTask["description"],
    //         $arrayTask["status"],
    //         $arrayTask["priority"]);
    //     }
    //     return $tasks;
    // }

    public function getPendingTasks(): array
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM tasks WHERE status = :status");
        $requete->execute(['status' => 'pending']);
        $arrayPends = $requete->fetchAll();
        $pends = [];
        foreach ($arrayPends as $arrayPend) {
            //Istantiation d'un objet Task avec les données du tableau associatif  
            $pends[] = new Task(
                $arrayPend["ID"],
                $arrayPend["title"],
                $arrayPend["description"],
                $arrayPend["status"],
                $arrayPend["priority"]
            );
        }
        return $pends;
    }

    // 2. Sélectionner les tâches "in_progress"
    public function getInProgressTasks(): array
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM tasks WHERE status = :status");
        $requete->execute(['status' => 'in_progress']);
        $arrayProgs = $requete->fetchAll();
        $progs = [];
        foreach ($arrayProgs as $arrayProg) {
            //Istantiation d'un objet Task avec les données du tableau associatif  
            $progs[] = new Task(
                $arrayProg["ID"],
                $arrayProg["title"],
                $arrayProg["description"],
                $arrayProg["status"],
                $arrayProg["priority"]
            );
        }
        return $progs;
    }

    // 3. Sélectionner les tâches "completed"
    public function getCompletedTasks(): array
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM tasks WHERE status = :status");
        $requete->execute(['status' => 'in_progress']);
        $arrayComps = $requete->fetchAll();
        $comps = [];
        foreach ($arrayComps as $arrayComp) {
            //Istantiation d'un objet Task avec les données du tableau associatif  
            $comps[] = new Task(
                $arrayComp["ID"],
                $arrayComp["title"],
                $arrayComp["description"],
                $arrayComp["status"],
                $arrayComp["priority"]
            );
        }
        return $comps;
    }

    public function selectByID(int $ID): Task|False
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM tasks WHERE ID = :ID;");
        $requete->execute([
            ":ID" => $ID
        ]);

        $arrayTask = $requete->fetch();

        //Si pas de résultat fetch()
        if (!$arrayTask) {
            return false;
        }
        //Renvoyer l'instance d'un objet Task$task avec les données du tableau associatif
        return new Task(
            $arrayTask["ID"],
            $arrayTask["title"],
            $arrayTask["description"],
            $arrayTask["status"],
            $arrayTask["priority"]
        );
    }


    public function insert(Task $task): bool
    {
        $requete = self::getConnexion()->prepare("INSERT INTO tasks (title,description,status,priority) VALUES (:title,:description,:status,:priority);");

        $requete->execute([
            ":title" => $task->getTitle(),
            ":description" => $task->getDescription(),
            ":status" => $task->getStatus(),
            ":priority" => $task->getPriority()
        ]);

        return $requete->rowCount() > 0;
    }

    public function update(Task $task): bool
    {
        $requete = self::getConnexion()->prepare("UPDATE tasks SET title = :title, description = :description, status = :status, priority = :priority WHERE ID = :ID;");
        $requete->execute(
            [
                ":title" => $task->getTitle(),
                ":description" => $task->getDescription(),
                ":status" => $task->getStatus(),
                ":priority" => $task->getPriority(),
                ":ID" => $task->getID()
            ]
        );
        return $requete->rowCount() > 0;
    }

    public function deleteByID(int $ID): bool
    {
        $requete = self::getConnexion()->prepare("DELETE FROM tasks WHERE ID = :ID;");
        $requete->execute([
            ":ID" => $ID
        ]);

        return $requete->rowCount() > 0;
    }
}
