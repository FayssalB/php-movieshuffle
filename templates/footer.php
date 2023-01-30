<div class="pagination-container">
    <?php
    $dsn = "mysql:host=localhost;dbname=movieshuffle";
    $db = new PDO($dsn, "root", "");

    $nombre_element_par_page=3;
    $nombre_pages = ceil(count($tab)/$nombre_element_par_page);
    @$page= $_GET["page"];
    $debut = ($page-1)*$nombre_element_par_page;
    
    $query = $db->prepare("SELECT *  FROM movieslist where title  like '%$keywords%' Limit 0,3");
    $query->execute();
    $tab_filtre = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    ?>

    <div id="pagination-test">
    <?php 
    if(isset($_GET["page"]) && !empty($_GET["page"])){
    
    $id = $_GET["page"];

    // foreach($tab as $ta){
    //     for($i=0, $i<count($tab);$i++){
    //         if($id ==)
    //     }
    // }

    for($i=0;$i<count($tab_filtre);$i++){
       ?>
        <div><?= $tab_filtre[$i]["title"]?></div>

    <?php  
      
    } 
    }
    ?>
    
    </div>
    <?php


    if ($nombre_pages > $nombre_element_par_page) {
        for ($i = 1; $i <= $nombre_pages; $i++) {
    ?>
        <a class="pagination-link" href="index.php?keywords=i&page<?=$i?>"><?= $i ?></a>
        
    <?php
        }
    } ?>

</div>

</body>



</html>