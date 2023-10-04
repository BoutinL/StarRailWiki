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

    public function findOneByCommentId($id)
    {
        $sql = "SELECT t.*
        FROM " . $this->tableName . " t
        WHERE id_".$this->tableName." = :id";

        return $this->getOneorNullResult(
            DAO::select($sql, ['id' => $id], false),
            $this->className
        );
    }

    public function updateRole($id, $roleUser){
        $sql = "UPDATE ".$this->tableName." 
        SET role = :roleUser
        WHERE id_".$this->tableName." = :id";
        
        DAO::update($sql, [
                    'id' => $id,
                    'roleUser' => $roleUser
                ]);  
    }
    
    public function getUsersNbr(){

        $sql = "SELECT COUNT(*) AS nbrUsers
        FROM " .$this->tableName. " t
        WHERE t.role = 'ROLE_MEMBER'";

        return $this->getSingleScalarResult(
            DAO::select($sql), 
            $this->className
        );
    }

    public function getAllUsers( $intFirstUserByPage, $intUsersByPage){

        $sql = "SELECT t.id_trailblazer, t.email, t.username, t.dateRegister, t.role
        FROM " .$this->tableName. " t

        ORDER BY dateRegister DESC LIMIT ".$intFirstUserByPage.", ".$intUsersByPage;
        return $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }

    public function deleteProfile($id){
        $sql = "DELETE FROM " . $this->tableName . "
                WHERE id_" . $this->tableName . " = :id";

        DAO::delete($sql, ['id' => $id]);
    }

    public function modifyPassword($id, $passwordHash){

        $sql = "UPDATE ".$this->tableName." 
                SET password = :passwordHash
                WHERE id_".$this->tableName." = :id";
                
        DAO::update($sql, [
                            'id' => $id,
                            'passwordHash' => $passwordHash,
                        ]);  
    }

}