<?php
namespace Model\Entities;

use App\Entity;

final class Ability extends Entity{

        private $id;
        private $name;
        private $description;
        private $energyGeneration;
        private $energyCost;
        private $dmg;
        private $icon;
        private $playableCharacter;
        private $typeAbility;
        private $tagAbility;

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

        public function getDescription()
        {
                return $this->description;
        }

        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        public function getEnergyGeneration()
        {
                return $this->energyGeneration;
        }

        public function setEnergyGeneration($energyGeneration)
        {
                $this->energyGeneration = $energyGeneration;

                return $this;
        }

        public function getEnergyCost()
        {
                return $this->energyCost;
        }

        public function setEnergyCost($energyCost)
        {
                $this->energyCost = $energyCost;

                return $this;
        }

        public function getDmg()
        {
                return $this->dmg;
        }

        public function setDmg($dmg)
        {
                $this->dmg = $dmg;

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

        public function getTypeAbility()
        {
                return $this->typeAbility;
        }

        public function setTypeAbility($typeAbility)
        {
                $this->typeAbility = $typeAbility;

                return $this;
        }

        public function getTagAbility()
        {
                return $this->tagAbility;
        }

        public function setTagAbility($tagAbility)
        {
                $this->tagAbility = $tagAbility;

                return $this;
        }
}