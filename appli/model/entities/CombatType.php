<?php
        namespace Model\Entities;

        use App\Entity;

        final class CombatType extends Entity{

        private $id;
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