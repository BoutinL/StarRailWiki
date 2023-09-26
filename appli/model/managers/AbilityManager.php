<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class AbilityManager extends Manager{

        protected $className = "Model\Entities\Ability";
        protected $tableName = "ability";

        public function __construct(){
            parent::connect();
        }

        public function getAbilitiesByPlayableCharacterId($id){

            $sql = "SELECT a.*
            FROM " .$this->tableName. " a
            INNER JOIN playablecharacter p ON p.id_playableCharacter = a.playableCharacter_id
            WHERE a.playableCharacter_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );
        }

        public function getAbilities(){

            $sql = "SELECT id_ability, name
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

        public function deleteAbility($id){
            $sql = "DELETE FROM " . $this->tableName . "
                    WHERE id_" . $this->tableName . " = :id";

            DAO::delete($sql, ['id' => $id]);
        }

        public function updateAbility($id, $playableCharacter, $name, $description,
        $energyGeneration, $energyCost, $dmg, $image, $typeAbility, $tagAbility)
        {
            $sql = "UPDATE ".$this->tableName." 
                    SET playableCharacter_id = :playableCharacter,
                    name = :name,
                    description = :description,
                    energyGeneration = :energyGeneration,
                    energyCost = :energyCost,
                    dmg = :dmg,
                    icon = :image,
                    typeAbility_id = :typeAbility,
                    tagAbility_id = :tagAbility
                    WHERE id_".$this->tableName." = :id";
            DAO::update($sql, [
                                'id' => $id,
                                'playableCharacter' => $playableCharacter,
                                'name' => $name,
                                'description' => $description,
                                'energyGeneration' => $energyGeneration,
                                'energyCost' => $energyCost,
                                'dmg' => $dmg,
                                'image' => $image,
                                'typeAbility' => $typeAbility,
                                'tagAbility' => $tagAbility,
                            ]);  
        }
    }
