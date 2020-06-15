<?php include ('../include/admin_header.php'); ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><img src="../img/BoiPathok.jpg"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create New Admin Account!</h1>
              </div>
              <form class="user" action="" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"  placeholder="Enter Name" name="admin_name" required="">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="address" placeholder="Phone Number" name="admin_phone" required="">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Address (exm: Sylhet,Bangladesh)" name="admin_address" required="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label style="padding-left: 8px; font-size: 18px; font-weight: bold;">Gender</label>
                    <select class="form-control form-control-user-custom" name="admin_gender">
                      <option value="0">Select Your Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label style="padding-left: 15px; font-size: 18px; font-weight: bold;">Date of Birth</label>
                    <input type="date" class="form-control form-control-user-custom" placeholder="Date of Birth" name="admin_birthdate" required="">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="admin_email" required="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="admin_password" required="">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Confirm Password" name="admin_confrim_password" required="">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" name="submit">
                  Register Account
                </button>
                <hr>
                <a href="index.php" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


<?php 
	if (isset($_POST['submit'])) {
		$name = $_POST['admin_name'];
		$phone = $_POST['admin_phone'];
		$address = $_POST['admin_address'];
    $gender = $_POST['admin_gender'];
   	$admin_birthdate = $_POST['admin_birthdate'];
		$email = $_POST['admin_email'];
		$password = sha1($_POST['admin_password']);
		$confirm_password = sha1($_POST['admin_confrim_password']);
		$join_date = date('d,F,Y');

		include '../include/dbcon.php';

		if (!empty($name)) {
			if(!empty($phone)) {
				if (!empty($address)) {
					if (!$gender == '0') {
			      if(!empty($admin_birthdate)) {
			        if(!empty($email)) {
			          $sql = "SELECT * FROM admin WHERE admin_email = '$email'";
			          $run = mysqli_query($con,$sql);
			          $email_check = mysqli_num_rows($run);
			            if (!$email_check > 0) {
			              	
				            if (!empty($password)) {
				              if ($confirm_password == $password) {
				                $sql2 = "INSERT INTO admin (admin_name,admin_phone,admin_address,admin_gender,admin_birthdate,admin_email,admin_password,join_date) VALUES ('$name','$phone','$address','$gender','$admin_birthdate','$email','$confirm_password','$join_date')";
				                $run2 = mysqli_query($con,$sql2);
				                  if($run2){
				                    ?>
				                      <script>swal("Congratulation","New Admin Added","success");</script>
				                      <?php
				                    }else{
				                    ?>
				                      <script>swal("Failed","Admin Added Failed","error");</script>
				                    <?php
				                      }
				                 		}else{
				                    	echo "Confirm Password Not Matched";
				                  		}
				                	}else{
				                 		 echo "Password Undefined";
				                	}
			                	}else{
			                		echo "<script>swal('Email Already Registered!','Please, try a new email!','error');</script>";
			                	}
			              }else{
			                echo "Email Undefined";
			             	}
			          }else{
			              echo "<script>alert('Input your Date of Birth');</script>";
			          }
			      }else{
			            echo "<script>alert('Please, Select Your Gender');</script>";
			      }
				}else{
					echo "Address Undefined";
				}
			}else{
				echo "Phone Number Undefined!";
			}
		}else{
			echo "Name Undefined!";
		}
	}


	include ('../include/admin_footer.php'); 
?>