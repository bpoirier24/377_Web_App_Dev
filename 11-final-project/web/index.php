<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Image Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Random Image Generator</h1>
        <?php
            $imagesDir = 'images/';
            // $images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            $images=scandir($imagesDir);
            $randomImage = $images[array_rand($images)]; 
            print_r($randomImage);
        ?>
        <img id="randomImage" src="images/<?php echo $randomImage; ?>" alt="Random Image">
        <form action="index.php" method="post">
            <button type="submit" name="generateButton">Generate Random Image</button>
        </form>
    </div>

    <?php
      
    ?>
</body>
</html>
