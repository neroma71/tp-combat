<?php
    abstract class Hero{
       
        private int $id;
        private string $name;
        protected int $healt_point = 100;
        private string $categorie;
        private int $energie = 100;
        private string $images = '';
       

        public function __construct(array $datas){
                if(isset($datas['id'])){
                        $this->setId($datas['id']);
                }
                if(isset($datas['name'])){
                        $this->setName($datas['name']);
                }
                if(isset($datas['healt_point'])){
                        $this->setHealt_point($datas['healt_point']);
                }
                if(isset($datas['categorie'])){
                        $this->setCategorie($datas['categorie']);
                }
                if(isset($datas['energie'])){
                        $this->setEnergie($datas['energie']);
                }
                if(isset($datas['images'])){
                        $this->setImages($datas['images']);
                }
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

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

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
         * Get the value of categorie
         */ 
        public function getCategorie()
        {
                return $this->categorie;
        }

        /**
         * Set the value of categorie
         *
         * @return  self
         */ 
        public function setCategorie($categorie)
        {
                $this->categorie = $categorie;

                return $this;
        }

        /**
         * Get the value of enrgie
         */ 
        public function getEnergie()
        {
                return $this->energie;
        }

        /**
         * Set the value of enrgie
         *
         * @return  self
         */ 
        public function setEnergie($energie)
        {
                $this->energie = $energie;

                return $this;
        }

        public function hit(Monster $monster)
        {
                $degat = rand(0, 50);
                $monsterHp = $monster->getHealt_point();
                $monster->setHealt_point($monsterHp - $degat);

                return $degat;
            }

        abstract public function specialAttack(Monster $monster);
    }