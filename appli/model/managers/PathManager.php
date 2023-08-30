<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\PathManager;

    class PathManager extends Manager{

        protected $className = "Model\Entities\Path";
        protected $tableName = "path";

        public function __construct(){
            parent::connect();
        }

        public function getPath(){

            $sql = "SELECT *
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

    }