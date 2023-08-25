<?php
        class Guerrier extends Hero
        {

                public function __construct(array $datas)
                {
                        parent::__construct($datas);
                }
            
        public function specialAttack(Monster $monster){
                $degat = parent::hit($monster);              
                return $degat * 2;
                    }
        }