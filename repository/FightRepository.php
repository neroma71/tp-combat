<?php
   class FightRepository
   {
        public function createMonster()
        {
           $monster = new Monster("toto", 100); 

           return $monster;
        }

        public function fight($hero, $monster)
        {
            $baston = [];

            while($hero->getHealt_point() > 0 && $monster->getHealt_point() >0 ){
                
            }

        }
   } 