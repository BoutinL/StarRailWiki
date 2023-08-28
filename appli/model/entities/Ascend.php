<?php
    namespace Model\Entities;

    use App\Entity;

    final class Ascend extends Entity{

        private $id;
        private $capLvl;
        private $nbr;
        private $lvl;

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

        public function getCapLvl()
        {
                return $this->capLvl;
        }

        public function setCapLvl($capLvl)
        {
                $this->capLvl = $capLvl;

                return $this;
        }

        public function getNbr()
        {
                return $this->nbr;
        }

        public function setNbr($nbr)
        {
                $this->nbr = $nbr;

                return $nbr;
        }

        public function getLvl()
        {
                return $this->lvl;
        }

        public function setLvl($lvl)
        {
                $this->lvl = $lvl;

                return $lvl;
        }

    }