<?php
namespace Model\Entities;

use App\Entity;

final class Eidolon extends Entity{

        private $id;
        private $name;
        private $effect;    
        private $icon;
        private $nbr;
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

        public function getNbr()
        {
                return $this->nbr;
        }

        public function setNbr($nbr)
        {
                $this->nbr = $nbr;

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

        public function getIcon()
        {
                return $this->icon;
        }

        public function setIcon($icon)
        {
                $this->icon = $icon;

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