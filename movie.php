<?php
function formatYYYY($date)
{
    return date("Y", strtotime($date));
}
function minToHour($min){
    return  $min /60;
}


$find = false;
$item = array("name" => "film introuvable.");
if (isset($_GET["id"])) {
    $json = file_get_contents("movies.json");
    $tab_movies = json_decode($json, true);

    foreach ($tab_movies as $movie) {
        if ($_GET["id"] == $movie["id"]) {
            $find = true;
            $item = $movie;
        }
    }
} 

include("templates/header.php")
?>


    <?php
    if ($find) {
    ?>

        <div class="row-container">

            <div class="left-side">
                <img src="./img\poster/<?= $test = str_replace(" ", "-", $item["title"]);
                $test1 = strtolower($test);
                $item["title"] ?>.jpg" alt="">
            </div>

            <div class="right-side">
                <h3><?= formatYYYY($item["releaseDate"])  ?></h3>
                <h1><?= $item["title"] ?></h1>
                <p class="description"><?= $item["description"] ?></p>
                <p class="genre"><?= implode(" ", $item["genres"]) ?></p>
                <p class="duree"><?= round(minToHour($item["duration"]),2) . " min " . date("d/m/Y", strtotime($item["releaseDate"])) ?> </p>

                <a class="b-a" href="<?= $item["video"]?>">Bande annonce</a>
            </div>
        </div>
    <?php } else echo $item["name"]?>
</body>

</html>