<div class="pagination-container">
    <?php
    if ($nombre_pages > $nombre_element_par_page) {
        for ($i = 1; $i <= $nombre_pages; $i++) {
    ?>
        
        <a class="pagination-link" href=""><?= $i ?></a>
        
    <?php
        }
    } ?>

</div>

</body>

<script>
    balisei = document.getElementById("i");
    inpt = document.getElementById("in");
    console.log(inpt);
    console.log(balisei);
    balisei.onclick = () => inpt.classList.toggle("active");
</script>

</html>