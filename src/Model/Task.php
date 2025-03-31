<?php
namespace App\Model;

/** 
 * Réprésentation de la table Car en objet PHP 
 */ 
class Task
{

    private ?int $id;
    private string $title;
    private string $description;
    private string $category;
    private string $status;

    public function __construct(int|null $id, string $title, string $description, string $category, string $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->status = $status;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}