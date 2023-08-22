<?php
    require_once("utils/db_connect.php");
    require_once("utils/loadClass.php");


        $heroRepo = new HeroRepository($bdd);
        $hero = $heroRepo->find($_GET['id']);

        $fightManager = new FightRepository();
        $monster = $fightManager->createMonster();

        $bastons = $fightManager->fight($hero, $monster);
        
        foreach($bastons as $baston){
            echo $baston."<br />";
        }
?>