<?php
namespace Model\Entities;

use App\Entity;

final class Rating extends Entity{

        private $id;
        private $rate;
        private $playableCharacter;
        private $trailblazer;
        private $finalRate;
        private $nbrOfRating;

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

        public function getRate()
        {
                return $this->rate;
        }

        public function setRate($rate)
        {
                $this->rate = $rate;

                return $this;
        }
        
        public function getPlayableCharacter()
        {
                return $this->playableCharacter;
        }

        public function setPlayableCharacter($playableCharacter)
        {
                $this->playableCharacter = $playableCharacter;

                return $this;
        }

        public function getTrailblazer()
        {
                return $this->trailblazer;
        }

        public function setTrailblazer($trailblazer)
        {
                $this->trailblazer = $trailblazer;

                return $this;
        }

        public function getFinalRate()
        {
                return $this->finalRate;
        }

        public function setFinalRate($finalRate)
        {
                $this->finalRate = $finalRate;

                return $this;
        }

        public function getNbrOfRating()
        {
                return $this->nbrOfRating;
        }

        public function setNbrOfRating($nbrOfRating)
        {
                $this->nbrOfRating = $nbrOfRating;

                return $this;
        }
}