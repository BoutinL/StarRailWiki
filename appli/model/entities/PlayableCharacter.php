<?php
        namespace Model\Entities;

        use App\Entity;

        final class PlayableCharacter extends Entity{

        private $id;
        private $name;
        private $image;
        private $rarity;
        private $sex;
        private $specie;
        private $faction;
        private $world;
        private $releaseDate;
        private $combatType;
        private $path;
        private $introduction;
        private $quote;

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

        public function getImage()
        {
                return $this->image;
        }

        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }

        public function getRarity()
        {
                return $this->rarity;
        }

        public function setRarity($rarity)
        {
                $this->rarity = $rarity;

                return $this;
        }

        public function getSex()
        {
                return $this->sex;
        }

        public function setSex($sex)
        {
                $this->sex = $sex;

                return $this;
        }

        public function getSpecie()
        {
                return $this->specie;
        }

        public function setSpecie($specie)
        {
                $this->specie = $specie;

                return $this;
        }

        public function getFaction()
        {
                return $this->faction;
        }

        public function setFaction($faction)
        {
                $this->faction = $faction;

                return $this;
        }

        public function getWorld()
        {
                return $this->world;
        }

        public function setWorld($world)
        {
                $this->world = $world;

                return $this;
        }

        public function getReleaseDate()
        {
                return $this->releaseDate;
        }

        public function setReleaseDate($releaseDate)
        {
                $this->releaseDate = $releaseDate;

                return $this;
        }

        // Anti-slash pour faire référence non à une classe mais à la fonction native
        public function getReleaseDateFormat()
        {
                $date = new \DateTime($this->releaseDate);
                return $date->format("d-m-Y");
        }


        public function getCombatType()
        {
                return $this->combatType;
        }

        public function setCombatType($combatType)
        {
                $this->combatType = $combatType;

                return $this;
        }

        public function getPath()
        {
                return $this->path;
        }

        public function setPath($path)
        {
                $this->path = $path;

                return $this;
        }

        public function getIntroduction()
        {
                return $this->introduction;
        }

        public function setIntroduction($introduction)
        {
                $this->introduction = $introduction;

                return $this;
        }

        public function getQuote()
        {
                return $this->quote;
        }

        public function setQuote($quote)
        {
                $this->quote = $quote;

                return $this;
        }

        // Charger l'image de l'élément
        public function getImgCombatType()
        {
                $result = "";
                switch ($this->combatType->getType()) {
                case "Physical":
                        $result = '<img src="public/img/physical.png" alt="Combat Type Physical">';
                        break;
                case "Fire":
                        $result = '<img src="public/img/fire.png" alt="Combat Type Fire">';
                        break;
                case "Ice":
                        $result = '<img src="public/img/ice.png" alt="Combat Type Ice">';
                        break;
                case "Lightning":
                        $result = '<img src="public/img/lightning.png" alt="Combat Type Lightning">';
                        break;
                case "Wind":
                        $result = '<img src="public/img/wind.png" alt="Combat Type Wind">';
                        break;
                case "Quantum":
                        $result = '<img src="public/img/quantum.png" alt="Combat Type Quantum">';
                        break;
                case "Imaginary":
                        $result = '<img src="public/img/imaginary.png" alt="Combat Type Imaginary">';
                        break;
                }
                return $result;
        }

        // Charger l'image de la voie
        public function getImgPath()
        {
                $result = "";
                switch ($this->path->getType()) {
                case "Destruction":
                        $result = '<img src="public/img/destruction.png" alt="Path Destruction">';
                        break;
                case "Hunt":
                        $result = '<img src="public/img/hunt.png" alt="Path Hunt">';
                        break;
                case "Erudition":
                        $result = '<img src="public/img/erudition.png" alt="Path Erudition">';
                        break;
                case "Harmony":
                        $result = '<img src="public/img/harmony.png" alt="Path Harmony">';
                        break;
                case "Nihility":
                        $result = '<img src="public/img/nihility.png" alt="Path Nihility">';
                        break;
                case "Preservation":
                        $result = '<img src="public/img/preservation.png" alt="Path Preservation">';
                        break;
                case "Abundance":
                        $result = '<img src="public/img/abundance.png" alt="Path Abundance">';
                        break;
                }
                return $result;
        }

        public function combatTypeCss(){
                $cssProperties = "";
                switch ($this->combatType->getType()) {
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

        public function combatTypeCssBis(){
                $cssProperties = "";
                switch ($this->combatType->getType()) {
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

        public function combatTypeCssLink(){
                $cssProperties = "";
                switch ($this->combatType->getType()) {
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
