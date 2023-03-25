<?php

$conn = mysqli_connect('localhost', 'root', '', 'btwev')
    or die("Can not connect database" . mysqli_connect_error());

require_once './Config/Functions.php';
$Fun_call = new Functions();

if (!isset($_SESSION['user_name']) && !isset($_SESSION['user_uni_no'])) {
    header('Location:../login/login.php');
}

// $select_post = $Fun_call->select_order('poster', 'p_id');


$field['verify_token'] = $_SESSION['user_uni_no'];
$sel_user_img = $Fun_call->select_assoc('users', $field);

$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$select_post = $conn->query("SELECT * FROM poster LIMIT $start, $limit");
$poster = $select_post->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT count(p_id) AS id FROM poster");
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;
?>
<style>
    .pagination {
        margin-left: 10%;

    }

    .pagi {
        text-align: center;
        padding: 5px;
        border: solid 0.5px;
    }
</style>


<div class="row" style="margin-left: 51%">
    <div class="col-md-10">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="pagi">
                    <a href="post.php?page=<?= $Previous; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                    <li class="pagi"><a href="post.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
                <li class="pagi">
                    <a href="post.php?page=<?= $Next; ?>" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="text-center" style="margin-top: 20px" class="col-md-2">
        <form method="post" action="#">
            <!-- <select name="limit-records" id="limit-records"> -->
            <!-- <option disabled="disabled" selected="selected" style="display: none"></option> -->
            <?php foreach ([4] as $limit) :
                4 ?>
                <!-- <option <?php if (isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit)
                                    echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option> -->
            <?php endforeach; ?>
            <!-- </select> -->
        </form>
    </div>
</div>


<div class="cintainer-fluid">
    <div class="container">
        <div class="row" style="position: relative; left: 18%;">
            <?php if ($select_post) {
                foreach ($select_post as $select_post_data) { ?>
                    <div class="col-sm-6 mt-2 mb-2">
                        <div class="card">
                            <img src="/1640/image/<?php echo $select_post_data['p_image']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $select_post_data['p_name']; ?> #
                                    <?php
                                    $cat_id = $select_post_data['p_cat'];
                                    $catName = "SELECT cat_name FROM categories WHERE cat_id= '$cat_id'";
                                    $catName_run = $conn->query($catName);
                                    while ($row = mysqli_fetch_array($catName_run)) {
                                        echo $row['cat_name'];
                                    }

                                    ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo substr($select_post_data['p_text'], 0, 200) . '&nbsp;.......'; ?>
                                </p>
                                <a href="post_view.php?post_uni_no=<?php echo $select_post_data['p_uni_no']; ?>" class="btn btn-sm btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>


</div>



<script type="text/javascript">
    $(document).ready(function() {
        $("#limit-records").change(function() {
            $('form').submit();
        })
    })
</script>