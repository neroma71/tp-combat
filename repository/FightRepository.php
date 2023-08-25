<?php
   class FightRepository
   {

        //creation de la fonction  random monster on passe le tab randomConfig
        public function createRandomMonster(array $monsterConfigs) {
            $randomIndex = array_rand($monsterConfigs);
            $randomMonsterConfig = $monsterConfigs[$randomIndex];
    
            $monster = new Monster($randomMonsterConfig['name'], $randomMonsterConfig['healt_point'], $randomMonsterConfig['images']);
            return $monster;
        }

        /*public function createMonster()
        {
           $monster = new Monster("sorcier", 100, ''); 
           return $monster;
        }*/

        public function fight($hero, $monster)
        {
        
           

            //$monster = $this->createRandomMonster($monsterConfigs);
            $bastons = [];

            while($hero->getHealt_point() > 0 && $monster->getHealt_point() >0 )
            {
                $damage = $monster->hit($hero);
                $bastons[] = "<div class='monster'><h3>". $monster->getName()."</h3><p> inflige à ".$hero->getName()." ". $damage . " point de dégats <br /> pv restant ". $hero->getHealt_point(). " </p></div>";

                if($hero->getHealt_point() > 0 && method_exists($hero, 'specialAttack')){
                    $specialDamage = $hero->specialAttack($monster);
                    $damage = $hero->hit($monster);
                    $bastons[] = "<div class='hero'><h3>".$hero->getName()."</h3><p> inflige à ".$monster->getName()." ". ($damage + $specialDamage)." point de dégat avec son attaque spéciale de ".$specialDamage." et son attaque normale de ".$damage."<br /> pv restant ".$monster->getHealt_point()."</p></div>";
                }

                
            }
        if($hero->getHealt_point() < 1){
            $bastons[] = "<h3>".$monster->getName()." vous a mis une bonne branlée vous perdez 15$</h3>";
           // header("Refresh:35; ./loose.php");

        }else{
            $bastons[] = "<h3>".$hero->getName()." a botté le cul de ".$monster->getName()." vous gagnez 15$</h3>";
            //header("Refresh:35; ./win.php?id=".$hero->getId());
        }
        return $bastons;
        }
   } 