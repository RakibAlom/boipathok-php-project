<?php 
    session_start();
    include ('header.php'); 
?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <div class="mag-login-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Great to have you back!</h5>
                        </div>

                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email or Phone Number" name="user" required="">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required="">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                            </div>
                            <button class="btn mag-btn mt-30" name="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $password = sha1($_POST['password']);
        include ('dbcon.php');

        $sql = "SELECT * FROM user WHERE user_email = '$user' AND user_password = '$password' OR user_phone = '$user' AND user_password = '$password'";
        $run = mysqli_query($con,$sql);
        $check = mysqli_num_rows($run);
        if ($check == 0) {
            ?>
            <script>alert('email or password invalid');</script>
            <?php
        }else{
            $result = mysqli_fetch_assoc($run);
            $email = $result['user_email'];
            $name = $result['user_name'];
            
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            ?>
            <script>window.open('user/index.php','_self');</script>
            <?php
        }
    }
    
    include ('footer.php'); 
?>