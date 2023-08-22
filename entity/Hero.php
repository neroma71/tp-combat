<?php
    class Hero{
       
        private int $id;
        private string $name;
        private int $healt_point = 100; 
       

        public function __construct(array $datas){
                if(isset($datas['id'])){
                        $this->setId($datas['id']);
                }
                if(isset($datas['name'])){
                        $this->setName($datas['name']);
                }
                if(isset($datas['$healt_point'])){
                        $this->setHealt_point($datas['healt_point']);
                }
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

        public function hit(Monster $monster){
                $degat = rand(0, 10);
                $monsterHp = $monster->getHealt_point();
                $monster->setHealt_point($monsterHp - $degat);

                return $degat;
            }

    }