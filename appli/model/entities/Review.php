<?php
    namespace Model\Entities;

    use App\Entity;

    final class Review extends Entity{

        private $id;
        private $rating;
        private $playableCharacter;

        public function __construct($data){         
            $this->hydrate($data);        
        }

        // Getter and Setter
        
        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getRating()
        {
                return $this->rating;
        }

        public function setRating($rating)
        {
                $this->rating = $rating;

                return $this;
        }

        public function getPlayableCharacter()
        {
                return $this->playableCharacter;
        }

        public function setPlayableCharacter($playableCharacter)
        {
                $this->playableCharacter = $playableCharacter;

                return $playableCharacter;
        }

    }