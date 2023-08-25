<?php
class FightRepository
{
    public function createMonster()
    {
        $monster = new Monster("sorcier", 100, 'images/cuir1.jpg'); 
        return $monster;
    }

    public function createRandomMonster(array $monsterConfigs) {
        $randomIndex = array_rand($monsterConfigs);
        $randomMonsterConfig = $monsterConfigs[$randomIndex];

        return new Monster($randomMonsterConfig['name'], $randomMonsterConfig['healt_point'], $randomMonsterConfig['image']); // Utilisez 'image' au lieu de 'images'
    }

    public function fight($hero, $monster)
    {
        $monsterConfigs = [
            ['name' => 'Sorcier', 'healt_point' => 110, 'image' => 'images/cuir1.jpg'], // Utilisez 'image' au lieu de 'images'
            ['name' => '0gre', 'healt_point' => 130, 'image' => 'images/cuir2.jpg'], // Utilisez 'image' au lieu de 'images'
            ['name' => 'Fantassin', 'healt_point' => 120, 'image' => 'images/mechant1.jpg'] // Utilisez 'image' au lieu de 'images'
        ];

        $monster = $this->createRandomMonster($monsterConfigs);

        $bastons = [];

        // Le reste de votre code de combat...
    }
    }