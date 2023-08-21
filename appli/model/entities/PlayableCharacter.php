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
        private $rate;
        private $combatType;
        private $path;

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

        public function getRate()
        {
                return $this->rate;
        }

        public function setRate($rate)
        {
                $this->rate = $rate;

                return $this;
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
    }