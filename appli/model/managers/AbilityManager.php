<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\AbilityManager;

    class AbilityManager extends Manager{

        protected $className = "Model\Entities\Ability";
        protected $tableName = "ability";

        public function __construct(){
            parent::connect();
        }

        public function getAbilitiesByPlayableCharacterId($id){

            $sql = "SELECT a.*
            FROM " .$this->tableName. " a
            INNER JOIN playablecharacter p ON p.id_playableCharacter = a.playableCharacter_id
            WHERE a.playableCharacter_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );
        }
    }
