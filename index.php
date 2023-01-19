<?php
$json = file_get_contents("movies.json");

$tab_movies = json_decode($json, true);

include("templates/header.php");
?>



<div class="container">
    <?php
    foreach ($tab_movies as $movie) {
        $test = str_replace(" ", "-", $movie["title"]);
        $test1 = strtolower($test);
    ?>

        <div class="poster-container">
            <a href="movie.php?id=<?= $movie["id"] ?>">
                <img src="./img\poster/<?= $test1 ?>.jpg" alt="">
                <div class="poster-legend">
                    <h3><?= $movie["title"] ?></h3>
                    <p><?= implode(", ", $movie["genres"]) ?></p>
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