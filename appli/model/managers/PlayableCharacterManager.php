<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\PlayableCharacterManager;

    class PlayableCharacterManager extends Manager{

        protected $className = "Model\Entities\PlayableCharacter";
        protected $tableName = "playableCharacter";

        public function __construct(){
            parent::connect();
        }
    }