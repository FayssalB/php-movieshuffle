<?php

$find = false;
////CHANGEMENT ICI 
$dsn = "mysql:host=localhost;dbname=movieshuffle";
$db = new PDO($dsn, "root", "");

$query = $db->query("SELECT * FROM movieslist");

$movies = $query->fetchAll(PDO::FETCH_ASSOC);

include("templates/header.php");

if(@$tab){
    $movies = $tab;
}

?>



<div class="container">
    <?php
    foreach ($movies as $movie) {
        $test = str_replace(" ", "-", $movie["title"]);
        $test1 = strtolower($test);
    ?>

        <div class="poster-container">
            <a href="movie.php?id=<?= $movie["id"] ?>">
                <img src="./img\poster/<?= $test1 ?>.jpg" alt="">
                <div class="poster-legend">
                    <h3><?= $movie["title"] ?></h3>
                    <p><?= $movie["genre"]?></p>
                </div>
            </a>
        </div>


    <?php
    }
    ?>
</div>



<?php
include("templates/footer.php")
?>