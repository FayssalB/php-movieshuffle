<?php
$dsn = "mysql:host=localhost;dbname=movieshuffle";
$db = new PDO($dsn, "root", "");



// $recherche = "";
// $recher = trim(strip_tags($_GET[$recherche]));

$data = array("name" => "Recette introuvable");

@$keywords = $_GET["keywords"];
@$valider = $_GET["valider"];

if (!empty($keywords)) {
    $query = $db->prepare("SELECT * FROM movieslist where title like '%$keywords%'");
    $query->execute();
    $tab = $query->fetchAll();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Movie3000</title>
</head>

<body>
    <div class="header-container">
        <div>
            <h2><a href="index.php">MovieShuffle</a></h2>
        </div>
        <div >
            <form class="input-container" name="fo" action="" method="GET">
                <p id="pi" onclick="">🔍</p>
               
                <input id="in" type="text" name="keywords" placeholder="ICI" >

            </form>
           
        </div>
    </div>

    <script>
        p = document.getElementById("pi");
        p.onclick = ()=> document.getElementById("in").classList.toggle("active");
    </script>