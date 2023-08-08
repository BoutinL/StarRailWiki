<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\CombatTypeManager;

    class CombatTypeManager extends Manager{

        protected $className = "Model\Entities\CombatType";
        protected $tableName = "combattype";

        public function __construct(){
            parent::connect();
        }

    }