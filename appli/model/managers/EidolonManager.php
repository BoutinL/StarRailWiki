<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\EidolonManager;

    class EidolonManager extends Manager{

        protected $className = "Model\Entities\Eidolon";
        protected $tableName = "eidolon";

        public function __construct(){
            parent::connect();
        }

        public function getEidolonByPlayableCharacterId($id){

            $sql = "SELECT e.nbr, e.name, e.effect, e.icon
            FROM " .$this->tableName. " e
            INNER JOIN playablecharacter p ON p.id_playableCharacter = e.playableCharacter_id
            WHERE e.playableCharacter_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );

        }

        public function getEidolon(){

            $sql = "SELECT id_eidolon, name
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

        public function deleteEidolon($id){
            $sql = "DELETE FROM " . $this->tableName . "
                    WHERE id_" . $this->tableName . " = :id";

            DAO::delete($sql, ['id' => $id]);
        }

    }