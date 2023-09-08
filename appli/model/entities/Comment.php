<?php

namespace Model\Entities;

use App\Entity;
use DateTime;
use Model\Managers\CommentManager;

final class Comment extends Entity
{
    private $id;
    private $text;
    private $dateCreate;
    private $trailblazer;

    // Getter / Setter
    
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

    public function getTrailblazer()
    {
        return $this->trailblazer;
    }

    public function setTrailblazer($trailblazer)
    {
        $this->trailblazer = $trailblazer;
    }
}