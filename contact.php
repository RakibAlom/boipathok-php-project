<?php 
    include ('header.php'); 
    include ('dbcon.php'); 
?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="contact-content-area bg-white mb-30 p-30 box-shadow">
                        <!-- Google Maps -->
                        <div class="map-area mb-30">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d17214.399357381255!2d91.84129995450219!3d24.902017316137886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1563783447569!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Contact Info</h5>
                        </div>

                        <div class="contact-information mb-30">
                            <p>বই-পাঠক একটি মুক্ত গল্প এবং টিউটোরিয়ালের ভান্ডার। বই-পাঠক ব্যবহারকারী বন্ধুগন বই-পাঠক পরিবারের সদস্য। তারা এই ভান্ডারে নিজস্ব লেখা গল্প এবং টিউটোরিয়াল দিয়ে বই-পাঠকের ভান্ডার বৃদ্ধি করতে পারে।</p>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Our Office:</p>
                                    <h6>127/Block-A, Ghasitula, Sylhet, Bangladesh</h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Email:</p>
                                    <h6>boipathok0@gmail.com</h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Phone:</p>
                                    <h6>(+88) 01623 405027</h6>
                                </div>
                            </div>
                        </div>

                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>GET IN TOUCH</h5>
                        </div>

                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" placeholder="Name" name="contact_name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="E-mail" name="contact_email" required="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="message" cols="30" rows="10" placeholder="Message" name="contact_message" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" name="contact">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
    </section>
    <!-- ##### Contact Area End ##### -->

<?php 
    if (isset($_POST['contact'])) {
            $name = $_POST['contact_name'];
            $email = $_POST['contact_email'];
            $message = $_POST['contact_message'];

            if (!empty($name)) {
                if (!empty($email)) {
                    if (!empty($message)) {
                        $sql = "INSERT INTO contact (contact_name,contact_email,contact_message) VALUES ('$name','$email','$message')";
                        $run = mysqli_query($con,$sql);
                        if ($run) {
                            echo "<script>alert('Message send Successfully');</script>";
                        }else{
                            echo "<script>alert('Sorry, Something is Wrong');</script>";
                        }
                    }else{
                        echo "<script>alert('Input your Message');</script>";
                    }
                }else{
                    echo "<script>alert('Input your email');</script>";
                }
            }else{
                echo "<script>alert('Input your name');</script>";
            }
        }    

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