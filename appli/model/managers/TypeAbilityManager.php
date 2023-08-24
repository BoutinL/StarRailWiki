<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TypeAbilityManager;

    class TypeAbilityManager extends Manager{

        protected $className = "Model\Entities\TypeAbility";
        protected $tableName = "typeAbility";

        public function __construct(){
            parent::connect();
        }

    }