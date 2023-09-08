<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class CommentManager extends Manager{

        protected $className = "Model\Entities\Comment";
        protected $tableName = "comment";

        public function __construct(){
            parent::connect();
        }

        public function getCommentByPlayableCharacter($id){

            $sql = "SELECT c.*
            FROM " .$this->tableName. " c
            INNER JOIN playablecharacter p ON p.id_playablecharacter = c.playablecharacter_id
            WHERE c.playableCharacter_id = :id
            ORDER BY dateCreate DESC";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );
        }

    }
