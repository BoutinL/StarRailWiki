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

        public function combatTypeCss($playableCharacterCombatType){
                $cssProperties = "";
                
                switch ($playableCharacterCombatType) {
                        case "Physical":
                                $cssProperties = "border: solid #b2adad;";
                                break;
                        case "Fire":
                                $cssProperties = "border: solid #f84f36;";
                                break;
                        case "Ice":
                                $cssProperties = "border: solid #47c7fd";
                                break;
                        case "Lightning":
                                $cssProperties = "border: solid #df54ff";
                                break;
                        case "Wind":
                                $cssProperties = "border: solid #46de9d";
                                break;
                        case "Quantum":
                                $cssProperties = "border: solid #8880ff";
                                break;
                        case "Imaginary":
                                $cssProperties = "border: solid #ffeb61";
                                break;
                }
                return $cssProperties;
        }

        public function combatTypeCssBis($playableCharacterCombatType){
                $cssProperties = "";
                
                switch ($playableCharacterCombatType) {
                        case "Physical":
                                $cssProperties = "border-bottom: solid #b2adad;";
                                break;
                        case "Fire":
                                $cssProperties = "border-bottom: solid #f84f36;";
                                break;
                        case "Ice":
                                $cssProperties = "border-bottom: solid #47c7fd";
                                break;
                        case "Lightning":
                                $cssProperties = "border-bottom: solid #df54ff";
                                break;
                        case "Wind":
                                $cssProperties = "border-bottom: solid #46de9d";
                                break;
                        case "Quantum":
                                $cssProperties = "border-bottom: solid #8880ff";
                                break;
                        case "Imaginary":
                                $cssProperties = "border-bottom: solid #ffeb61";
                                break;
                }
                return $cssProperties;
        }

        public function combatTypeCssLink($playableCharacterCombatType){
                $cssProperties = "";
                
                switch ($playableCharacterCombatType) {
                        case "Physical":
                                $cssProperties = "combatTypeCssLinkPhysical";
                                break;
                        case "Fire":
                                $cssProperties = "combatTypeCssLinkFire";
                                break;
                        case "Ice":
                                $cssProperties = "combatTypeCssLinkIce";
                                break;
                        case "Lightning":
                                $cssProperties = "combatTypeCssLinkLightning";
                                break;
                        case "Wind":
                                $cssProperties = "combatTypeCssLinkWind";
                                break;
                        case "Quantum":
                                $cssProperties = "combatTypeCssLinkQuantum";
                                break;
                        case "Imaginary":
                                $cssProperties = "combatTypeCssLinkImaginary";
                                break;
                }
                return $cssProperties;
        }
}