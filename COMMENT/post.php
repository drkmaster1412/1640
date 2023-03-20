<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'btwev')
or die ("Can not connect database".mysqli_connect_error());


require_once './Config/Functions.php';
$Fun_call = new Functions();

if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_uni_no'])){
    header('Location:../login/login.php');
}

$select_post = $Fun_call->select_order('poster','p_id');


$field['verify_token'] = $_SESSION['user_uni_no'];
$sel_user_img = $Fun_call->select_assoc('users',$field);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f124118c9b.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="cintainer-fluid">
        <div class="container">
            <div class="row">
                <?php if($select_post){ foreach($select_post as $select_post_data){ ?>
                <div class="col-sm-6 mt-2 mb-2">
                    <div class="card">
                        <img src="/1640/image/<?php echo $select_post_data['p_image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $select_post_data['p_name']; ?> # 
                            <?php       
                            $cat_id = $select_post_data['p_cat'];
                            $catName = "SELECT cat_name FROM categories WHERE cat_id= '$cat_id'";
                            $catName_run = $conn ->query($catName );
                            while ($row = mysqli_fetch_array($catName_run)){
                                echo $row['cat_name'] ;
                            }

                                  ?></h5>
                            <p class="card-text"><?php echo substr($select_post_data['p_text'], 0, 200).'&nbsp;.......'; ?></p>
                            <a href="post_view.php?post_uni_no=<?php echo $select_post_data['p_uni_no']; ?>" class="btn btn-sm btn-primary">Read More</a>
                        </div>
                    </div>
                </div>  
                <?php }} ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>