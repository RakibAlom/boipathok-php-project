<?php 
    include ('user_header.php');
    include ('../dbcon.php');
?>

    <!-- ##### Mag Posts Area Start ##### -->
    <section class="mag-posts-area d-flex flex-wrap">

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area left-sidebar mt-3 mb-30 bg-white box-shadow">
            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Most Popular</h5>
                </div>
                <?php 
                    $sql = "SELECT * FROM post WHERE post_status = '1' ORDER BY post_id desc LIMIT 10";
                    $run = mysqli_query($con,$sql);
                    while($result = mysqli_fetch_assoc($run)) {
                        if (!$result['post_image'] == "") {
                 ?>
                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-thumbnail">
                        <img src="../adminpanel/img/post/<?php echo $result['post_image'] ?>" alt="">
                    </div>
                    <div class="post-content">
                        <a href="single-post.php" class="post-title"><?php echo $result['post_name']; ?></a>
                        <span><?php echo substr($result['post_text'],0,50); ?></span>
                        <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> </a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget">
                <a href="#" class="add-img"><img src="../img/bg-img/add.png" alt=""></a>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-15">
                <?php 
                    $sql = "SELECT * FROM post WHERE post_status = '1' ORDER BY post_id desc LIMIT 8";
                    $run = mysqli_query($con,$sql);
                    while($result = mysqli_fetch_assoc($run)){
                        if (!$result['post_image'] == "") {
                        }else{
                 ?>
                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex">
                    <div class="post-content">
                        <h1><a href="single-post.php" class="post-title"><?php echo $result['post_name']; ?></a></h1>
                        <span><?php echo substr($result['post_text'], 0,160); ?></span>
                        <div class="post-meta mt-1">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        </div>
                    </div>
                </div>
                <?php } } ?>

            </div>
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="mag-posts-content mt-3 mb-30 p-30 box-shadow">
            <!-- Feature Video Posts Area -->
            <div class="feature-video-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>News Feed</h5>
                </div>

                <div class="featured-video-posts">
                    <div class="row">
                        <div class="col-12">
                        <?php 
                            $sql = "SELECT * FROM post";
                            $run = mysqli_query($con,$sql);
                            $result_per_page = 10;
                            $number_of_result = mysqli_num_rows($run);
                            $number_of_page = ceil($number_of_result/$result_per_page);
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            }else{
                                $page = $_GET['page'];
                            }
                            $this_page_first_result = ($page - 1) * $result_per_page;
                
                            $sql = "SELECT categories.cate_name,categories_level.cate_level_name, post.* FROM post INNER JOIN categories ON categories.cate_id = post.cate_id INNER JOIN categories_level ON categories_level.cate_level_id = post.cate_level_id ORDER BY post_id desc LIMIT $this_page_first_result,$result_per_page";
                            $run = mysqli_query($con,$sql);
                            while($result = mysqli_fetch_assoc($run)){
                                if (!$result['post_image'] == "") {     
                        ?>
                            <div class="single-featured-post">
                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <h1><a href="" class="post-title"><?php echo $result['post_name']; ?></a></h1>
                                    <div class="post-meta">
                                        <a href="#"><?php echo $result['cate_name']; ?></a>
                                        <a href="#"><?php echo $result['cate_level_name']; ?></a>
                                    </div>
                                    <span><?php echo $result['post_date']; ?></span>
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail mb-50">
                                        <img src="../adminpanel/img/post/<?php echo $result['post_image']; ?>" alt="">
                                    </div>
                                    <p><?php echo substr($result['post_text'],0,250); ?> <a class="btn btn-sm btn-secondary" href="">Read more...</a></p>
                                    
                                    <span class="font-weight-bold"><i>Posted By: <?php echo $result['post_owner']; ?></i></span>
                                    
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
                                    <h1><a href="video-post.html" class="post-title"><?php echo $result['post_name']; ?></a></h1>
                                    <div class="post-meta">
                                        <a href="#"><?php echo $result['cate_name']; ?></a>
                                        <a href="#"><?php echo $result['cate_level_name']; ?></a>
                                        
                                    </div>
                                    <p><?php echo substr($result['post_text'],0,250); ?> <a class="btn btn-sm btn-secondary" href="">Read more...</a></p>
                                    <span class="font-weight-bold"><i>Posted By: <?php echo $result['post_owner']; ?></i></span>
                                    <span class="float-right"><i><?php echo $result['post_date']; ?></i></span>
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

            <!-- Most Viewed Videos -->
            <div class="most-viewed-videos mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Most Reading Story With Thumnail</h5>
                </div>

                <div class="most-viewed-videos-slide owl-carousel">
                <?php 
                    $sql = "SELECT * FROM post WHERE post_status = '1' ORDER BY post_id desc";
                    $run = mysqli_query($con,$sql);
                    while($result = mysqli_fetch_assoc($run)){
                        if(!$result['post_image'] == ""){
                 ?>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                    <a href="single-post.php">
                        <div class="post-thumbnail">
                            <img src="../adminpanel/img/post/<?php echo $result['post_image']; ?>" alt="">
                        </div>
                        <div class="post-content">
                            <h1><a href="single-post.php" class="post-title"><?php echo $result['post_name']; ?></a></h1>
                            <p><?php echo substr($result['post_text'], 0,180); ?></p>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                        </div>
                    </a>
                    </div>
                <?php } } ?>

                </div>
            </div>
            <?php /*
            <!-- Sports Videos -->
            <div class="sports-videos-area">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Latest News</h5>
                </div>
                <div class="row">
                    <?php 
                        $sql = "SELECT * FROM post WHERE cate_id = '6' ORDER BY post_id desc";
                        $run = mysqli_query($con,$sql);
                        while ($result = mysqli_fetch_assoc($run)) {
                    ?>
                    <!-- Single Blog Post -->
                    <div class="col-12 col-lg-6">
                        <div class="single-blog-post d-flex style-3 mb-30">
                            <div class="post-thumbnail">
                                <img src="<?php echo $result['post_image']; ?>" alt="">
                            </div>
                            <div class="post-content">
                                <a href="single-post.php" class="post-title"><?php echo $result['post_name']; ?></a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>

            </div>
            */
            ?>
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area right-sidebar mt-3 mb-30 box-shadow">
            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Social Followers Info -->
                <div class="social-followers-info">
                    <!-- Facebook -->
                    <a href="#" class="facebook-fans"><i class="fa fa-facebook"></i> 4,327 <span> Fans</span></a>
                    <!-- Twitter -->
                    <a href="#" class="twitter-followers"><i class="fa fa-twitter"></i> 3,280 <span>Followers</span></a>
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
                    <li><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $result['cate_level_name']; ?></span> 
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
                <a href="#" class="add-img"><img src="../img/bg-img/add2.png" alt=""></a>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Popular User</h5>
                </div>

                <?php 
                    $sql = "SELECT * FROM user ORDER BY user_id desc LIMIT 10";
                    $run = mysqli_query($con,$sql);
                    while($result = mysqli_fetch_assoc($run)){

                 ?>
                <!-- Single YouTube Channel -->
                <div class="single-youtube-channel d-flex">
                    <div class="youtube-channel-thumbnail">
                        <img src="../adminpanel/img/user/<?php echo $result['user_image']; ?>" alt="">
                    </div>
                    <div class="youtube-channel-content">
                        <a href="single-post.html" class="channel-title"><?php echo $result['user_name']; ?></a>
                        <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Follow</a>
                    </div>
                </div>
            <?php } ?>
                
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
                        <button class="btn mag-btn w-100" name="subscribe">Subscribe</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Mag Posts Area End ##### -->

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
    include ('user_footer.php'); 
?>