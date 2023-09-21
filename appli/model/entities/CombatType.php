<?php
        namespace Model\Entities;

        use App\Entity;
        // CombatType correspond to the 7 elements
        final class CombatType extends Entity{

        private $id;
        // name of the combatType
        private $type;

        public function __construct($data)
        {         
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

        public function getType()
        {
                return $this->type;
        }

        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }
}