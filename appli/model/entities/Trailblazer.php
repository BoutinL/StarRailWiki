<?php

namespace Model\Entities;

use App\Entity;
use DateTime;
use Model\Managers\TrailblazerManager;

final class Trailblazer extends Entity
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;
    private $dateRegister;

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

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRole()
    {
        return $this->role;
    }


    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getDateRegister()
    {
        return $this->dateRegister;
    }


    public function setDateRegister($dateRegister)
    {
        $this->dateRegister = $dateRegister;
    }

    // Anti-slash pour faire référence non à une classe mais à la fonction native
    public function getDateRegisterFormat()
    {
            $date = new \DateTime($this->dateRegister);
            return $date->format("d-m-Y");
    }


    public function hasRole($role)
    {
        if ($role == $this->role) {
            return true;
        }
        return false;
    }
}