<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class PlayableCharacterManager extends Manager{

        protected $className = "Model\Entities\PlayableCharacter";
        protected $tableName = "playablecharacter";

        public function __construct(){
            parent::connect();
        }
        
        public function getPlayableCharacter(){

            $sql = "SELECT id_playableCharacter, name, image,
            rarity, sex, specie, faction, world, quote,
            releaseDate, introduction, combatType_id, path_id
            FROM " .$this->tableName ;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        
        }

        public function getPlayableCharacterById($id){

            $sql = "SELECT id_playableCharacter, name, image, rarity, sex, specie, faction, world, quote, releaseDate, introduction, combatType_id, path_id
            FROM " .$this->tableName. "
            WHERE id_playableCharacter = :id";

            return $this->getOneorNullResult(
                DAO::select($sql, ['id' => $id]), 
                $this->className
            );
        
        }

        public function getOrderBy($idCombatType, $idPath)
        {
            $sql =  "SELECT id_playableCharacter, name, image, rarity, sex, specie, faction, world, quote, releaseDate, introduction, combatType_id, path_id
                    FROM " .$this->tableName ."
                    WHERE combatType_id = :idCombatType AND path_id = :idPath";
                    
                    return $this->getMultipleResults(
                        DAO::select($sql, [
                            "idCombatType" => $idCombatType,
                            "idPath" => $idPath
                        ]), 
                        $this->className
                    );
        }

        public function deleteCharacter($id){
            $sql = "DELETE FROM " . $this->tableName . "
                    WHERE id_" . $this->tableName . " = :id";

            DAO::delete($sql, ['id' => $id]);
        }
        
        public function updateCharacter($id, $name, $image, $rarity, $sex, $specie, $faction, $world, $quote, $releaseDate, $introduction, $combatType, $path)
        {
            // combatType_id = :combatType / 'combatType' => $combatType,
            $sql = "UPDATE ".$this->tableName." 
                    SET name = :name, image = :image, rarity = :rarity, sex = :sex, specie = :specie, faction = :faction, world = :world, quote = :quote, releaseDate = :releaseDate, introduction = :introduction, combatType_id = :combatType, path_id = :path
                    WHERE id_".$this->tableName." = :id";
                    
            DAO::update($sql, [
                                'id' => $id,
                                'name' => $name,
                                'image' => $image,
                                'rarity' => $rarity,
                                'sex' => $sex,
                                'specie' => $specie,
                                'faction' => $faction,
                                'world' => $world,
                                'quote' => $quote,
                                'releaseDate' => $releaseDate,
                                'introduction' => $introduction,
                                'combatType' => $combatType,
                                'path' => $path,
                            ]);  
        }
    }   