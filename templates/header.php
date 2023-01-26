<?php
$dsn = "mysql:host=localhost;dbname=movieshuffle";
$db = new PDO($dsn, "root", "");

$data = array("name" => "Recette introuvable");

@$keywords = $_GET["keywords"];
@$valider = $_GET["valider"];

if (!empty($keywords)) {
    $query = $db->prepare("SELECT * FROM movieslist where title like '%$keywords%'");
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_ASSOC);
    var_dump($tab);
    
    $nombre_element_par_page=3;
    $nombre_pages = ceil(count($tab)/$nombre_element_par_page);
    echo $nombre_pages;


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Movie3000</title>
</head>

<body>
    <div class="header-container">
        <div>
            <h2><a href="index.php">MovieShuffle</a></h2>
        </div>
        <div>
            <form class="input-container" action="" method="GET">
                
                <i id="i" class="fa-solid fa-magnifying-glass"></i>
                <input id="in" type="text" name="keywords" >

            </form>

        </div>
    </div>

    