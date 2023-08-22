<?php
   class FightRepository
   {
        public function createMonster()
        {
           $monster = new Monster("mael", 100); 

           return $monster;
        }

        public function fight($hero, $monster)
        {
            $baston = [];

            while($hero->getHealt_point() > 0 && $monster->getHealt_point() >0 ){
                $damage = $monster->hit($hero);
                $bastons[] = $monster->getName()." inflige à ".$hero->getName(). $damage . " point de dégats ";

                if($hero->getHealt_point() > 0){
                    $damage = $hero->hit($monster);
                    $bastons[] = $hero->getName()." inflige à ".$monster->getName(). $damage . " point de dégats ";
                }
                
            }
        if($hero->getHealt_point() < 1){
            $baston[] = "le ".$hero->getName()." est mort";
        }else{
            $baston[] = "le ".$hero->getName()." est mort";
        }
        return $bastons;
        }
   } 