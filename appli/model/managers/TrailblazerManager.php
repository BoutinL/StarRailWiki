<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class TrailblazerManager extends Manager
{
    protected $className = "Model\Entities\Trailblazer";
    protected $tableName = "trailblazer";

    public function __construct()
    {
        parent::connect();
    }

    public function getUserById($id)
    {
        $sql = "SELECT t.id_user, t.username, t.email, t.role, t.dateRegister
                FROM " . $this->tableName . " t
                WHERE id_user = :id";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }

    public function findOneByEmail($email)
    {
        $sql = "SELECT *
        FROM " . $this->tableName . " a
        WHERE email = :email";

        return $this->getOneorNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }

    public function findOneByUser($username)
    {
        $sql = "SELECT t.*
        FROM " . $this->tableName . " t
        WHERE username = :username";

        return $this->getOneorNullResult(
            DAO::select($sql, ['username' => $username], false),
            $this->className
        );
    }

    public function retrievePassword($email)
    {
        $sql = "SELECT t.password
        FROM " . $this->tableName . " t
        WHERE email = :email";
        return $this->getSingleScalarResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }
}