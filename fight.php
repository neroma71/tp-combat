<?php
    require_once("utils/db_connect.php");
    require_once("utils/loadClass.php");


        $fightManager = new FightRepository();
        $monster = $fightManager->createMonster();
        $hero = new HeroRepository($bdd);

?>