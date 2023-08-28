<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\AscendManager;

    class AscendManager extends Manager{

        protected $className = "Model\Entities\Ascend";
        protected $tableName = "ascend";

        public function __construct(){
            parent::connect();
        }

    }