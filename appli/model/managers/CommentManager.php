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

        public function getCommentByPlayableCharacterId($id){

            $sql = "SELECT c.*
            FROM " .$this->tableName. " c
            INNER JOIN review r ON r.id_review = c.review_id
            WHERE c.review_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );
        }

    }
