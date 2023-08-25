<?php

    class Monster
    {
        private string $name;
        private int $healt_point;
        private $images;

        public function __construct($name, $healt_point, $images)
        {
             $this->name = $name;
             $this->healt_point = $healt_point;
             $this->images = $images;
        }

        /**
         * Get the value of images
         */ 
        public function getImages()
        {
                return $this->images;
        }

        /**
         * Set the value of images
         *
         * @return  self
         */ 
        public function setImages($images)
        {
                $this->images = $images;

                return $this;
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
            $degat = rand(0, 50);
            $heroHp = $hero->getHealt_point();
            $hero->setHealt_point($heroHp - $degat);

            return $degat;
        }

    }