<div class="col-sm-9">
    <?php 
        $page = isset($_GET['page']) ? $_GET["page"] : $chart;
        include ($page);
    ?>
</div>