<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class TraceManager extends Manager{

        protected $className = "Model\Entities\Trace";
        protected $tableName = "trace";

        public function __construct(){
            parent::connect();
        }

        public function getTraceByPlayableCharacterId($id){

            $sql = "SELECT t.id_trace, t.name, t.effect, t.ascend_id, t.icon
            FROM " .$this->tableName. " t
            INNER JOIN ascend a ON a.id_ascend = t.ascend_id
            INNER JOIN playablecharacter p ON p.id_playableCharacter = t.playableCharacter_id
            WHERE t.playableCharacter_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );

        }

        public function getTrace(){

            $sql = "SELECT id_trace, name, effect
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

        public function deleteTrace($id){
            $sql = "DELETE FROM " . $this->tableName . "
                    WHERE id_" . $this->tableName . " = :id";

            DAO::delete($sql, ['id' => $id]);
        }

        public function updateTrace($id, $playableCharacter, $name, $effect, $ascend, $image)
        {

            // exemple for character combatType_id = :combatType / 'combatType' => $combatType,
            $sql = "UPDATE ".$this->tableName." 
                    SET playableCharacter_id = :playableCharacterTrace,
                    name = :nameTrace,
                    effect = :effectTrace,
                    ascend_id = :ascendTrace,
                    icon = :imageUrlTrace
                    WHERE id_".$this->tableName." = :id";
                        DAO::update($sql, [
                                'id' => $id,
                                'playableCharacterTrace' => $playableCharacter,
                                'nameTrace' => $name,
                                'effectTrace' => $effect,
                                'ascendTrace' => $ascend,
                                'imageUrlTrace' => $image
                            ]);  
        }

    }