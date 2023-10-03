<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class CommentManager extends Manager{

        protected $className = "Model\Entities\Comment";
        protected $tableName = "comment";

        public function __construct(){
            parent::connect();
        }
        
        public function getCommentByPlayableCharacter($id, $intFirstCommentByPage, $intCommentByPage){

            $sql = "SELECT c.*
            FROM " .$this->tableName. " c
            INNER JOIN playablecharacter p ON p.id_playablecharacter = c.playablecharacter_id
            WHERE c.playableCharacter_id = :id
            ORDER BY dateCreate DESC LIMIT ".$intFirstCommentByPage.", ".$intCommentByPage;

            return $this->getMultipleResults(
                DAO::select($sql, [
                    "id" => $id
                ]), 
                $this->className
            );
        }

        public function getCommentsNbr($id){

            $sql = "SELECT COUNT(*) AS nbrComments
            FROM " .$this->tableName. " c
            WHERE c.playableCharacter_id = :id";

            return $this->getSingleScalarResult(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );
        }

        public function deleteComment($id){

            $sql = "DELETE FROM " . $this->tableName . "
            WHERE id_" . $this->tableName . " = :id";

            DAO::delete($sql, ['id' => $id]);
        }
        
    }