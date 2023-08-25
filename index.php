<?php
require_once("utils/db_connect.php");
require_once("utils/loadClass.php");

//on créait un nouvel objet $manager qui est une instance de la class HeroRepository 
$manager = new HeroRepository($bdd);

//on détermine si le champs nom existe 
if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['categorie']) && !empty($_POST['categorie'])) {
    // on créait un nouvel objet héro qui est une instance de la class Héro et on lui passe le nom.
    $heroData = [
        'name' => $_POST['name'],
        'categorie' => $_POST['categorie']
    ];
  
    if ($_POST['categorie'] === 'guerrier') {
        $hero = new Guerrier($heroData);
    } elseif ($_POST['categorie'] === 'mage') {
        $hero = new Mage($heroData);
    } elseif ($_POST['categorie'] === 'archer') {
        $hero = new Archer($heroData);
    } else {
        // Gérer le cas où la catégorie n'est pas reconnue
    }
        
    if (isset($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'upload/';
        $uploadFile = $uploadDir . basename($_FILES['images']['name']);

        if (move_uploaded_file($_FILES['images']['tmp_name'], $uploadFile)) {
            $hero->setImages($uploadFile);
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    }
    
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="container">
        <h1>Le combat des chefs</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-7 text-center">
                <form method="post" action="" enctype="multipart/form-data">
                    <p>
                        <label>rentrer un nom</label>
                    </p>
                    <p>
                    <input type="text" name="name">
                    </p>
                    <p>
                    <select name="categorie">
                        <option value="">choisir un type de personnage</option>
                            <option value="guerrier">gerrier</option>
                            <option value="archer">archer</option>
                            <option value="mage">mage</option>
                    </select>
                    </p>
                    <p>
                        <label>charger une image de profile</label>
                    </p>
                    <p>
                        <input type="file" name="images">
                    </p>
                    <p>
                    <input type="submit" value="soumettre">
                    </p>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($herosdatas as $h) { ?>
                <div class="col-3 text-center m-5 ">
                    <h3>
                        <?php echo $h->getName(); ?></h3>
                        <img src="<?php echo $h->getImages(); ?>" alt="Image de profil" class="profile-image">
                        <p><?php echo $h->getCategorie(); ?><p>
                    <p>point de vie <?php echo $h->getHealt_point(); ?><p>
                        <button class="btn btn-danger"><a href="fight.php?id=<?php echo $h->getId(); ?>">combatre</a></button>
                </div>
                    <?php }; ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>