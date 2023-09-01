<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TagAbilityManager;

    class TagAbilityManager extends Manager{

        protected $className = "Model\Entities\TagAbility";
        protected $tableName = "tagAbility";

        public function __construct(){
            parent::connect();
        }

        public function getTagAbility(){

            $sql = "SELECT id_tagAbility, type
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

    }