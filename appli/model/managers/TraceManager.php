<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TraceManager;

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

    }