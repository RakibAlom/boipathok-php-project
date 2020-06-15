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
                        <h2>Signup</h2>
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
                <div class="col-12 col-lg-8">
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Welcome to our family!</h5>
                        </div>

                        <form action="signup.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="user_name" placeholder="enter your name" required="">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" name="user_phone" placeholder="enter phone number" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="exmaple: Sylhet, Bangldesh" name="user_address" required="">
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="user_gender" >
                                        <option value="0">Select Your Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" name="user_birthdate" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="enter your valid email" name="user_email" required="">
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="user_password" placeholder="type six+ digit for strong password" required="">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="user_confirm_password" placeholder="Retype your password" required="">
                                </div>
                            </div>

                            <input type="hidden" name="user_join_date">
                            <input type="hidden" name="user_status" value="1">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                            </div>
                            <button class="btn mag-btn mt-30" name="signup">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    if (isset($_POST['signup'])) {
        $name = $_POST['user_name'];
        $phone = $_POST['user_phone'];
        $address = $_POST['user_address'];
        $gender = $_POST['user_gender'];
        $birthdate = $_POST['user_birthdate'];
        $email = $_POST['user_email'];
        $password = sha1($_POST['user_password']);
        $confirm_password = sha1($_POST['user_confirm_password']);
        $join_date = date('d,F,Y');
        $status = $_POST['user_status'];


        if (!empty($name)) {
            if (!empty($phone)) {
                if (!empty($address)) {
                    if (!$gender == '0') {
                        if (!empty($birthdate)) {
                            if (!empty($email)) {
                                $sql = "SELECT * FROM user WHERE user_email = '$email'";
                                $run = mysqli_query($con,$sql);
                                $email_check = mysqli_num_rows($run);
                                if (!$email_check > 0) {
                                    if (!empty($password)) {
                                        if (!empty($confirm_password)) {
                                            if ($confirm_password == $password) {
                                                $sql2 = "INSERT INTO user (user_name,user_phone,user_address,user_gender,user_birthdate,user_email,user_password,user_join_date,user_status) VALUES ('$name','$phone','$address','$gender','$birthdate','$email','$confirm_password','$join_date','$status')";
                                                $run2 = mysqli_query($con,$sql2);
                                                if ($run) {
                                                    echo "<script>window.open('login.php','_self');</script>";
                                                }else{
                                                    echo "<script>alert('Something wrong. Please, try again!');</script>";
                                                }
                                            }else{
                                                echo "<script>alert('Password not matching!');</script>";
                                            }
                                        }else{
                                            echo "<script>alert('Input Confrim Password');</script>";
                                        }
                                    }else{
                                        echo "<script>alert('Input Password');</script>";
                                    }
                                }else{
                                    echo "<script>alert('Already Registered. Please, Try a new email!');</script>";   
                                }
                            }else{
                                echo "<script>alert('Input a Valid Email');</script>";
                            }
                        }else{
                            echo "<script>alert('Input your Date of Birth');</script>";
                        }
                    }else{
                        echo "<script>alert('Select you Gender');</script>";
                    }
                }else{
                    echo "<script>alert('Input your address!');</script>";
                }
            }else{
                echo "<script>alert('Input your phone number');</script>";
            }
        }else{
            echo "<script>alert('Invalid Name');</script>";
        }
        
    }
    include ('footer.php'); 
?>