<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class CombatTypeManager extends Manager{

        protected $className = "Model\Entities\CombatType";
        protected $tableName = "combattype";

        public function __construct(){
            parent::connect();
        }

        public function getCombatType(){

            $sql = "SELECT *
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

    }