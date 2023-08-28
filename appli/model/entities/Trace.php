<?php
namespace Model\Entities;

use App\Entity;

final class Trace extends Entity{

        private $id;
        private $name;
        private $effect;
        private $ascend;
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

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function getEffect()
        {
                return $this->effect;
        }

        public function setEffect($effect)
        {
                $this->effect = $effect;

                return $this;
        }

        public function GetAscend()
        {
                return $this->ascend;
        }

        public function setAscend($ascend)
        {
                $this->ascend = $ascend;

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

}