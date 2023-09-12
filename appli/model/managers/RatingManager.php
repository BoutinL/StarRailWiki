<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class RatingManager extends Manager{

        protected $className = "Model\Entities\Rating";
        protected $tableName = "rating";

        public function __construct(){
            parent::connect();
        }

        public function getRatingOfCharacter($id){

            $sql = "SELECT COUNT(r.rate) AS nbrOfRating, ceil(AVG(r.rate)) AS finalRate
                    FROM ".$this->tableName." r
                    INNER JOIN playablecharacter p ON p.id_playableCharacter = r.playableCharacter_id
                    WHERE r.playableCharacter_id = :id";

            return $this->getSingleScalarResult(
                DAO::select($sql, ['id' => $id])
            );
        
        }

        public function getRatingByTrailblazer($idTrailblazer, $idPlayableCharacter){

            $sql = "SELECT *
            FROM " .$this->tableName. " r
            WHERE r.trailblazer_id = :idTrailblazer AND r.playableCharacter_id = :idPlayableCharacter";

            return $this->getOneOrNullResult(
                DAO::select($sql, [
                    'idTrailblazer' => $idTrailblazer,
                    'idPlayableCharacter' => $idPlayableCharacter
                ], false),
                $this->className
            );
        }
    }