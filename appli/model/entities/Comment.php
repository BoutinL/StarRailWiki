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
    private $playableCharacter;

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

    // Anti-slash pour faire référence non à une classe mais à la fonction native
    public function getDateCreateFormat()
    {
            $date = new \DateTime($this->dateCreate);
            return $date->format("d-m-Y H:i");
    }

    public function getTrailblazer()
    {
        return $this->trailblazer;
    }

    public function setTrailblazer($trailblazer)
    {
        $this->trailblazer = $trailblazer;
    }

    public function getPlayableCharacter()
    {
        return $this->playableCharacter;
    }

    public function setPlayableCharacter($playableCharacter)
    {
        $this->playableCharacter = $playableCharacter;
    }
}