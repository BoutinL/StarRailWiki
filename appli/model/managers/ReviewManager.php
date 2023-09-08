<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class ReviewManager extends Manager{

        protected $className = "Model\Entities\Review";
        protected $tableName = "review";

        public function __construct(){
            parent::connect();
        }

        public function getReviewByPlayableCharacterId($id){

            $sql = "SELECT r.*
            FROM " .$this->tableName. " r
            INNER JOIN playablecharacter p ON p.id_playableCharacter = r.playableCharacter_id
            WHERE r.playableCharacter_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );
        }

    }
