<?php
require_once("utils/db_connect.php");
require_once("utils/loadClass.php");

$monsterConfigs = [
    ['name' => 'ho-chi-min', 'healt_point' => 110, 'images' => 'images/ho-chi-minh.jpg'],
    ['name' => 'pol-pot', 'healt_point' => 130, 'images' => 'images/pol_pot.jpg'],
    ['name' => 'kim jung un', 'healt_point' => 120, 'images' => 'images/kim.png']
];



$fightManager = new FightRepository();
$monster = $fightManager->createRandomMonster($monsterConfigs);


     header("Refresh:5; ./index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/loose.css">
</head>
<body>
<div class="block-img" id="m2"><img src="<?php echo $monster->getImages(); ?>"></div>
<h1><?php echo $monster->getName(); ?> vous à mis une bonne branlée</h1>
</body>
</html>