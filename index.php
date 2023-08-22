<?php
    require_once("utils/db_connect.php");
    require_once("utils/loadClass.php");

//on créait un nouvel objet $manager qui est une instance de la class HeroRepository 
     $manager = new HeroRepository($bdd);
    
    //on détermine si le champs nom existe 
    if(isset($_POST['name']) && !empty($_POST['name'])){
  // on créait un nouvel objet héro qui est une instance de la class Héro et on lui passe le nom.
        $hero = new Hero(['name', 'healt_point']);
        $hero->setName($_POST["name"]);
        //on appel la fonction add du manager
        $manager->add($hero);

    }
    //appel à la méthode de HeroRepository findAllAlive(); qui fait l'affichage (le select);
    $herosdatas = $manager->findAllAlive();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <label>rentrer un nom</label>
        <input type="text" name="name">
        <input type="submit" value="soumettre">
    </form>
<?php foreach($herosdatas as $h) { ?>
   
        <h3><?php echo $h->getName(); ?></h3>
        <p><?php echo $h->getHealt_point(); ?><p>
      <button><a href="fight.php?id=<?php echo $h->getId(); ?>">combatre</a></button>
     
    <?php }; ?>
</body>
</html>