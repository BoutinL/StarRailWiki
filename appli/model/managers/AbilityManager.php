<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\AbilityManager;

    class AbilityManager extends Manager{

        protected $className = "Model\Entities\Ability";
        protected $tableName = "ability";

        public function __construct(){
            parent::connect();
        }

    }