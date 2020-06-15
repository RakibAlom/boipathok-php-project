<?php 
  include ('../include/admin_header.php');
  include ('../include/dbcon.php');
  $id = $_GET['admin_id'];
  $sql = "SELECT * FROM admin WHERE admin_id = '$id'";
  $run = mysqli_query($con,$sql);
  $result = mysqli_fetch_assoc($run); 
?>

<div class="container">
    <h4 class="font-weight-bold">Setting</h4>
    <div class="card o-hidden border-0 shadow-lg my-3">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit Profile Information</h1>
              </div>
              <form class="user" action="" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"  placeholder="Enter Name" name="admin_name" required="" value="<?php echo $result['admin_name']; ?>">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="address" placeholder="Phone Number" name="admin_phone" required="" value="<?php echo $result['admin_phone']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Address (exm: Sylhet,Bangladesh)" name="admin_address" required="" value="<?php echo $result['admin_address']; ?>">
                </div>
                <button class="btn btn-primary btn-user btn-block" name="submit">
                  Change Profile Information
                </button>
              </form>
            </div>
          </div>
        </div>

        <hr class="sidebar-divider">

        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Make a new Profile Picture</h1>
              </div>
              <form class="user" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Upload a Picture (Max size: 2MB)</label>
                  <input type="file" name="image" class="alert alert-secondary">
                </div>
                <button class="btn btn-primary btn-user btn-block" name="change_image">
                  New Profile Picture
                </button>
              </form>
            </div>
          </div>
        </div>

        <hr class="sidebar-divider">

        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Change Your Password</h1>
              </div>
              <form class="user" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" placeholder="old password" name="old_password">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user"  placeholder="new password" name="new_password" required="">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="address" placeholder="confirm new password" name="confirm_new_password" required="">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" name="change_password">
                  Change Password
                </button>
              </form>
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

        include '../include/dbcon.php';

        if (!empty($name)) {
            if(!empty($phone)){
                if (!empty($address)) {
                    $sql = "UPDATE admin SET admin_name = '$name', admin_phone = '$phone', admin_address = '$address' WHERE admin_id = '$id'";
                    $run = mysqli_query($con,$sql);
                     if($run){
                        ?>
                           <script>swal("Information Updated","Please, Reload Page!","success");</script>
                        <?php
                      }else{
                        ?>
                           <script>swal("Failed Updated","Admin information update Failed","error");</script>
                        <?php
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

    if (isset($_POST['change_image'])) {
      $image = $_FILES['image']['name'];
      $tmp = $_FILES['image']['tmp_name'];

      $upload_path = '../img/admin/';
      $upload_check = move_uploaded_file($tmp, $upload_path.$image);

      if ($upload_check) {
        $sql = "UPDATE admin SET admin_image = '$image' WHERE admin_id = '$id'";
        $run = mysqli_query($con,$sql);
          if ($run) {
           ?>
             <script>swal("Image Uploaded","Please, Reload Page!","success");</script>
           <?php
        }else{
           ?>
             <script>swal("Sorry!","upload failed","error");</script>
           <?php
          }
      }else{
        ?>
            <script>swal("Failed!","Image Selected Failed","error");</script>
        <?php
      }
    }

    if (isset($_POST['change_password'])) {
      $old_password = sha1($_POST['old_password']);
      $new_password = sha1($_POST['new_password']);
      $confirm_new_password = sha1($_POST['confirm_new_password']);

      if ($old_password == $result['admin_password']) {
        if (!empty($new_password)) {
          if (!empty($confirm_new_password)) {
            if ($new_password == $confirm_new_password) {
              $sql = "UPDATE admin SET admin_password = '$confirm_new_password' WHERE admin_id = '$id'";
              $run = mysqli_query($con,$sql);
              if ($run) {
                ?>
                  <script>swal("Password Changed Successfully","","success");</script>
                <?php
              }else{
                ?>
                   <script>swal("Password Changed Failed","","error");</script>
                <?php
              }
            }else{
              ?>
                <script>swal("Confirm password not matching","","error");</script>
              <?php
            }
          }else{
            ?>
              <script>swal("Confirm password value null","","error");</script>
            <?php
          }
        }else{
          ?>
           <script>swal("Password value null","","error");</script>
          <?php
        }
      }else{
        ?>
          <script>swal("Old password is not correct","","error");</script>
        <?php
      }
    }

    include ('../include/admin_footer.php'); 
?>