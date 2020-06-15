<!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <!-- Logo -->
                        <a href="index.php" class="foo-logo">BoiPathok</a>
                        <p class="text-white">বই-পাঠক একটি মুক্ত গল্প এবং টিউটোরিয়ালের ভান্ডার। বই-পাঠক ব্যবহারকারী বন্ধুগন বই-পাঠক পরিবারের সদস্য। তারা এই ভান্ডারে নিজস্ব লেখা গল্প এবং টিউটোরিয়াল দিয়ে বই-পাঠকের ভান্ডার বৃদ্ধি করতে পারে।</p>
                        <div class="footer-social-info">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Categories</h6>
                        <nav class="footer-widget-nav">
                            <ul>
                            <?php 
                                include 'dbcon.php';
                                $sql = "SELECT * FROM categories WHERE cate_status = '1'";
                                $run = mysqli_query($con,$sql);
                                while($result = mysqli_fetch_assoc($run)) {
                            ?>
                                <li><a href="categories_post.php?categories=<?php echo $result['cate_id']; ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $result['cate_name']; ?></a></li>
                            <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Story</h6>
                        <!-- Single Blog Post -->
                        <?php 
                            $sql = "SELECT * FROM post WHERE post_status = '1' LIMIT 2";
                            $run = mysqli_query($con,$sql);
                            while ($result = mysqli_fetch_assoc($run)) {
                                
                         ?>
                        <div class="single-blog-post style-2 d-flex">
                            <div class="post-thumbnail">
                                <img src="adminpanel/img/post/<?php echo $result['post_image']; ?>" alt="">
                            </div>
                            <div class="post-content">
                                <a href="single-post.html" class="post-title"><?php echo $result['post_name']; ?></a>
                                <div class="post-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Level</h6>
                        <ul class="footer-tags">
                            <?php 
                                $sql = "SELECT * FROM categories_level WHERE cate_level_status = '1'";
                                $run = mysqli_query($con,$sql);
                                while($result = mysqli_fetch_assoc($run)){
                             ?>
                            <li><a href="#"><?php echo $result['cate_level_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://boi-pathok.blogspot.com" target="_blank">Boi-Pathok</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Advertisement</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>