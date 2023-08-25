<?php
    require_once("utils/db_connect.php");
    require_once("utils/loadClass.php");

    $monsterConfigs = [
        ['id'=>1, 'name' => 'ho-chi-min', 'healt_point' => 110, 'images' => 'images/ho-chi-minh.jpg'],
        ['id'=>2,'name' => 'pol-pot', 'healt_point' => 130, 'images' => 'images/pol_pot.jpg'],
        ['id'=>3,'name' => 'kim jung un', 'healt_point' => 120, 'images' => 'images/kim.png']
    ];


        $heroRepo = new HeroRepository($bdd);
        $hero = $heroRepo->find($_GET['id']);

        $fightManager = new FightRepository();
        $monster = $fightManager->createRandomMonster($monsterConfigs);

        $bastons = $fightManager->fight($hero, $monster);
        $heroRepo->update($hero);
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fight.css">
</head>
<body>
    <section class="container">
        <h1>fight</h1>
    <div class="row d-flex justify-content-center">
        <div class="block-img">
            <img src="<?php echo $hero->getImages(); ?>" alt="profile joueur">
        </div>
        <div class="block-img" id="m2"><img src="<?php echo $monster->getImages(); ?>"></div>
    </div>
    <button class="btn">fight</button>
        <div class="row justify-content-center m-5">
            <div class="col-7 text-center mt-2 mydiv">
            <?php
                foreach($bastons as $baston){
                echo $baston."<br />";
                }
            ?>
            </div>
        </div>
    </section>
<script>
    let monster = document.querySelector('.monster');
    let hero = document.querySelector('.hero');
    let mydiv = document.querySelector('.mydiv');
    let next = document.querySelector('.btn');
    let count = 0;
    mydiv.style.display = "none";
    next.addEventListener('click', ()=>{
        let baston = <?php echo json_encode($bastons); ?>;
        mydiv.style.display = "block";
            count++;
            mydiv.innerHTML = baston[count];
            if(count > baston.length - 1){
                document.location.href="index.php";
            }
         });
    

</script>
</body>
</html>