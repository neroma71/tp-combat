<?php
    header("Refresh:7; ./index.php");
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/bganim3.css">
</head>

<body>
    <section class="home">
          <h1>you win</h1>
        <h2>you lose</h2>
        <div class="banner">
            <p>no futur for you</p>
        </div>
    </section>
    <script>          
     const banner = document.querySelector('.banner');
        
        for(let i = 0; i < 400; i++){
            let blocks = document.createElement('div');
            blocks.classList.add('blocks');
            banner.appendChild(blocks);
            const duration = Math.random() * 5;
            blocks.style.animationDuration = 2 + duration + 's';
            blocks.style.animationDelay = duration +'s';
        }
      
</script>
</body>
</html>
