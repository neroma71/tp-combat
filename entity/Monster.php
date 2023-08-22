<?php

    class Monster
    {
        private string $name;
        private int $healt_point;

        public function __construct($name, $healt_point)
        {
             $this->name = $name;
             $this->healt_point = $healt_point;
        }

        /**
         * Get the value of healt_point
         */ 
        public function getHealt_point()
        {
                return $this->healt_point;
        }

        /**
         * Set the value of healt_point
         *
         * @return  self
         */ 
        public function setHealt_point($healt_point)
        {
                $this->healt_point = $healt_point;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function hit(Hero $hero){
            $degat = rand(0, 10);
            $heroHp = $hero->getHealt_point();
            $hero->setHealt_point($heroHp - $degat);

            return $degat;
        }
    }