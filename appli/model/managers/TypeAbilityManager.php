<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class TypeAbilityManager extends Manager{

        protected $className = "Model\Entities\TypeAbility";
        protected $tableName = "typeAbility";

        public function __construct(){
            parent::connect();
        }

        public function getTypeAbility(){

            $sql = "SELECT id_typeAbility, type
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        }

    }