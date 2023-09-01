<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\PlayableCharacterManager;

    class PlayableCharacterManager extends Manager{

        protected $className = "Model\Entities\PlayableCharacter";
        protected $tableName = "playableCharacter";

        public function __construct(){
            parent::connect();
        }
        
        public function getPlayableCharacter(){

            $sql = "SELECT id_playableCharacter, name
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

        public function deletePost($id){
            $sql = "DELETE FROM " . $this->tableName . "
                    WHERE id_" . $this->tableName . " = :id";

            DAO::delete($sql, ['id' => $id]);
        }

    }