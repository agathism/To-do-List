<?php
namespace App\Manager;

use App\Model\Task;


class TaskManager extends DatabaseManager
{

    public function selectAll(): array
    {
        //Récupération de la connexion PDO et requête SQL
        $requete = self::getConnexion()->prepare("SELECT * FROM tasks;");
        $requete->execute();

        $arrayTasks = $requete->fetchAll();
        //Créer un tableau qui contiendra les objets taches
        $tasks = [];
        foreach ($arrayTasks as $arrayTask) {
            //Istantiation d'un objet Task$task avec les données du tableau associatif  
            $tasks[] = new Task(
            $arrayTask["id"], 
            $arrayTask["title"], 
            $arrayTask["description"], 
            $arrayTask["category"], 
            $arrayTask["status"]);
        }

        return $tasks;
    }

    public function selectByID(int $id): Task|false
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM tasks WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        $arrayTask = $requete->fetch();

        //Si pas de résultat fetch()
        if(!$arrayTask) {

            return false;
        }
        //Renvoyer l'instance d'un objet Task$task avec les données du tableau associatif
        return new Task(
        $arrayTask["id"],
        $arrayTask["title"], 
        $arrayTask["description"], 
        $arrayTask["category"], 
        $arrayTask["status"]);
    }

   
    public function insertTask(Task $task): bool
    {
        $requete = self::getConnexion()->prepare("INSERT INTO tasks (title,description,category,status) VALUES (:title,:description,:category,:status);");

        $requete->execute([
            ":title" => $task->getTitle(),
            ":description" => $task->getDescription(),
            ":category" => $task->getCategory(),
            ":status" => $task->getStatus()
        ]);

        return $requete->rowCount() > 0;
    }

    public function updateTask(Task $task): bool
    {
        $requete = self::getConnexion()->prepare("UPDATE tasks SET title = :title, description = :description, category = :category, status = :status WHERE id = :id;");
        $requete->execute(
            [
                ":title" => $task->getTitle(),
                ":description" => $task->getDescription(),
                ":category" => $task->getCategory(),
                ":status" => $task->getStatus(),
                ":id" => $task->getId()
            ]
        );

        return $requete->rowCount() > 0;
    }

    public function deleteByID(int $id): bool
    {
        $requete = self::getConnexion()->prepare("DELETE FROM tasks WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        return $requete->rowCount() > 0;
    }
}