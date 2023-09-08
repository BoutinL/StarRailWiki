<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class AscendManager extends Manager{

        protected $className = "Model\Entities\Ascend";
        protected $tableName = "ascend";

        public function __construct(){
            parent::connect();
        }

        public function getAscend(){

            $sql = "SELECT id_ascend, capLvl, nbr
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

    }