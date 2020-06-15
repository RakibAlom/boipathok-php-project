<?php 
    include ('header.php'); 
    include ('dbcon.php'); 
    $id = $_GET['categories_level'];
    $sql = "SELECT categories.cate_name,categories_level.cate_level_name, post.* FROM post INNER JOIN categories ON categories.cate_id = post.cate_id INNER JOIN categories_level ON categories_level.cate_level_id = post.cate_level_id WHERE post.cate_level_id = '$id' AND post_status = '1'";
    $run = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($run);
    $result_per_page = 2;
    $number_of_result = mysqli_num_rows($run);
    $number_of_page = ceil($number_of_result/$result_per_page);
    if (!isset($_GET['page'])) {
        $page = 1;
    }else{
        $page = $_GET['page'];
    }
    $this_page_first_result = ($page - 1) * $result_per_page;
    $sql2 = "SELECT categories.cate_name,categories_level.cate_level_name, post.* FROM post INNER JOIN categories ON categories.cate_id = post.cate_id INNER JOIN categories_level ON categories_level.cate_level_id = post.cate_level_id WHERE post.cate_level_id = '$id' ORDER BY post_id desc LIMIT $this_page_first_result,$result_per_page";
    $run2 = mysqli_query($con,$sql2);

?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $result['cate_name']; ?></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $result['cate_level_name']; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive Post Area Start ##### -->
    <div class="archive-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="featured-video-posts">
                    <div class="row">
                        <div class="col-12">
                        <?php 
                            while($result2 = mysqli_fetch_assoc($run2)){
                                if (!$result2['post_image'] == "") {     
                        ?>
                            <div class="single-featured-post">
                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <h1><a href="single_post.php?post_id=<?php echo $result2['post_id']; ?>" class="post-title"><?php echo $result2['post_name']; ?></a></h1>
                                    <div class="post-meta">
                                        <a href="#"><?php echo $result2['cate_name']; ?></a>
                                        <a href="#"><?php echo $result2['cate_level_name']; ?></a>
                                    </div>
                                    <span><?php echo $result2['post_date']; ?></span>
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail mb-50">
                                        <img src="adminpanel/img/post/<?php echo $result2['post_image']; ?>" alt="">
                                    </div>
                                    <p><?php echo substr($result2['post_text'],0,450); ?> <a class="text-primary" href="single_post.php?post_id=<?php echo $result2['post_id']; ?>">Read more...</a></p>
                                    
                                    <span class="font-weight-bold"><i>Posted By: <?php echo $result2['post_owner']; ?></i></span>
                                    
                                </div>
                                <!-- Post Share Area -->
                                <div class="post-share-area d-flex align-items-center justify-content-between">
                                    <!-- Post Meta -->
                                    <div class="post-meta pl-3">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                    </div>
                                    <!-- Share Info -->
                                    <div class="share-info">
                                        <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        <!-- All Share Buttons -->
                                        <div class="all-share-btn d-flex">
                                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php }else{ ?>
                             <!-- Single Featured Post -->
                            <div class="single-featured-post">
                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <h1><a href="single_post.php?post_id=<?php echo $result2['post_id']; ?>" class="post-title"><?php echo $result2['post_name']; ?></a></h1>
                                    <div class="post-meta">
                                        <a href="#"><?php echo $result2['cate_name']; ?></a>
                                        <a href="#"><?php echo $result2['cate_level_name']; ?></a>
                                        
                                    </div>
                                    <p><?php echo substr($result2['post_text'],0,450); ?> <a class="text-primary" href="single_post.php?post_id=<?php echo $result2['post_id']; ?>">Read more...</a></p>
                                    <span class="font-weight-bold"><i>Posted By: <?php echo $result2['post_owner']; ?></i></span>
                                    <span class="float-right"><i><?php echo $result2['post_date']; ?></i></span>
                                </div>
                                <!-- Post Share Area -->
                                <div class="post-share-area d-flex align-items-center justify-content-between">
                                    <!-- Post Meta -->
                                    <div class="post-meta pl-3">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                    </div>
                                    <!-- Share Info -->
                                    <div class="share-info">
                                        <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        <!-- All Share Buttons -->
                                        <div class="all-share-btn d-flex">
                                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php } } ?>
                              
                        </div>

                    </div>
                </div>
                <div class="pagination-system mt-2" align="center">
                    <?php 
                        if ($page == 1) {
                        }else{
                            $previous_page = $page - 1;
                            ?><a href="index.php?page=<?php echo $previous_page ?>"><i class="fa fa-long-arrow-left"></i>  Previous page</a> &nbsp; &nbsp; &nbsp;
                            <?php
                        }
                     ?>
                    <?php 
                        if ($page == $number_of_page) {
                        }else{
                            $next_page = $page + 1;
                            ?>
                            <span class="next-page"><a href="index.php?page=<?php echo $next_page; ?>">Next Page <i class="fa fa-long-arrow-right"></i></a></span>
                            <?php
                        }
                     ?>
                </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                        <!-- Sidebar Widget -->
                        <div class="single-sidebar-widget p-30">
                            <!-- Social Followers Info -->
                            <div class="social-followers-info">
                                <!-- Facebook -->
                                <a href="#" class="facebook-fans"><i class="fa fa-facebook"></i> 4,360 <span>Fans</span></a>
                                <!-- Twitter -->
                                <a href="#" class="twitter-followers"><i class="fa fa-twitter"></i> 3,280 <span>Followers</span></a>
                                <!-- YouTube -->
                                <a href="#" class="youtube-subscribers"><i class="fa fa-youtube"></i> 1250 <span>Subscribers</span></a>
                                <!-- Google -->
                                <a href="#" class="google-followers"><i class="fa fa-google-plus"></i> 4,230 <span>Followers</span></a>
                            </div>
                        </div>

                        <!-- Sidebar Widget -->
                        <div class="single-sidebar-widget p-30">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5>Categories</h5>
                            </div>

                            <!-- Catagory Widget -->
                            <ul class="catagory-widgets">
                                <?php 
                                    $sql = "SELECT * FROM categories_level WHERE cate_level_status = '1'";
                                    $run = mysqli_query($con,$sql);
                                    while($result = mysqli_fetch_assoc($run)) {
                                 ?>
                                <li><a href="categories_level_post.php?categories_level=<?php echo $result['cate_level_id']; ?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $result['cate_level_name']; ?></span> 
                                    <?php 
                                        $cate_count = $result['cate_level_name'];
                                        $sql2 = "SELECT categories_level.cate_level_id, post.* FROM post INNER JOIN categories_level ON categories_level.cate_level_id = post.cate_level_id WHERE cate_level_name = '$cate_count'";
                                        $run2 = mysqli_query($con,$sql2);
                                        $check = mysqli_num_rows($run2)
                                     ?>
                                    <span><?php echo $check; ?></span></a></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <!-- Sidebar Widget -->
                        <div class="single-sidebar-widget">
                            <a href="#" class="add-img"><img src="img/bg-img/add2.png" alt=""></a>
                        </div>

                        <!-- Sidebar Widget -->
                        <div class="single-sidebar-widget p-30">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5>Subscribe Box</h5>
                            </div>

                            <div class="newsletter-form">
                                <p>Subscribe our newsletter for get notification about new updates, information discount, etc.</p>
                                <form action="" method="POST">
                                    <input type="email" name="subscribe_email" placeholder="Enter your email" required="">
                                    <button name="subscribe" class="btn mag-btn w-100">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Archive Post Area End ##### -->

<?php 
    if (isset($_POST['subscribe'])) {
        $email = $_POST['subscribe_email'];
        if (!empty($email)) {
            $sql = "SELECT * FROM subscribe WHERE subscribe_email = '$email'";
            $run = mysqli_query($con,$sql);
            $email_check = mysqli_num_rows($run);
            if (!$email_check > 0) {
                $sql2 = "INSERT INTO subscribe(subscribe_email) VALUES ('$email');";
                $run2 = mysqli_query($con,$sql2);
                if ($run2) {
                    echo "<script>alert('Thank you for subscribe!');</script>";
                }else{
                    echo "<script>alert('Sorry, Something Problem!');</script>";
                }
            
            }else{
                 echo "<script>alert('Already Subscribed. Thank you!');</script>";
            }
        }
    }
    include ('footer.php'); 
 ?>