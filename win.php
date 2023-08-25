<?php
require_once("utils/db_connect.php");
require_once("utils/loadClass.php");

$heroRepo = new HeroRepository($bdd);

$hero = $heroRepo->find($_GET['id']);
header("Refresh:5; ./index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/win.css">
</head>
<body>
    <h1><?php echo $hero->getName(); ?> a gagné un paquet de Marlborow</h1>
</body>
</html>