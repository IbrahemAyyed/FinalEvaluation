<?php

namespace App\Entity;

class Task {
    private $id;
    private $title;
    private $author;
    private $description;

    public function __construct($id, $title, $author, $description){
        $this->setId($id)->setTitle($title)->setAuthor($author)->setDescription($description);
    }


    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getAuthor() : string
    {
        return $this->author;
    }

    public function getDescription() : string
    {
        return $this->description;
    }



    public function setId(int $id) : Task
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle(string $title) : Task
    {
        $this->title = $title;
        return $this;
    }

    public function setAuthor(string $author) : Task
    {
        $this->author = $author;
        return $this;
    }

    public function setDescription(string $description) : Task
    {
        $this->description = $description;
        return $this;
    }

    
}