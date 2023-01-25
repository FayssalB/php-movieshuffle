<?php
function formatYYYY($date)
{
    return date("Y", strtotime($date));
}
function minToHour($min)
{
    $hours = floor($min / 60);
    $minutes = $min % 60;
    return  "{$hours}h {$minutes}min";
};


$find = false;
$item = array("name" => "film introuvable.");
if (isset($_GET["id"])) {


    $dsn = "mysql:host=localhost;dbname=movieshuffle";
    $db = new PDO($dsn, "root", "");

    $query = $db->query("SELECT * FROM movieslist");

    $movies = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($movies as $movie) {
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
            <p class="genre"><?=  $item["genre"] ?></p>
            <p class="duree"><?= (minToHour($item["duration"])) . " " . date("d/m/Y", strtotime($item["releaseDate"])) ?> </p>

            <a class="b-a" href="<?= $item["video"] ?>">Bande annonce</a>
        </div>
    </div>
<?php } else echo $item["name"] ?>
</body>

</html>