<?php
	include ('../include/admin_header.php'); 
	include ('../include/dbcon.php');
  $email = $_SESSION['email'];
	$sql = "SELECT * FROM admin WHERE admin_email = '$email'";
	$run = mysqli_query($con,$sql);
  $result = mysqli_fetch_assoc($run);
  $admin_id = $result['admin_id'];

  $sql2 = "SELECT categories.cate_name,categories_level.cate_level_name, post.* FROM post INNER JOIN categories ON categories.cate_id = post.cate_id INNER JOIN categories_level ON categories_level.cate_level_id = post.cate_level_id WHERE admin_id = '$admin_id'";
  $run2 = mysqli_query($con,$sql2);

?>

<!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="header-section">
              <span class="header-section-name">Your Profile</span>
              <div class="float-right">
                <a href="admin_edit.php?admin_id=<?php echo $result['admin_id']; ?>" class="btn btn-sm btn-primary">edit profile</a>
              </div>
            </div>
            <div class="profile-section mt-3">
                <img class="rounded" src="../img/admin/<?php echo $result['admin_image']; ?>">
            </div>

            <div class="main-content row mt-3 text-dark">
              <div class="col-md-6">
                <p>Name   : <?php echo $result['admin_name']; ?></p>
                <p>Date of Birth  : <?php echo $result['admin_birthdate']; ?></p>
                <p>Gender  : <?php echo $result['admin_gender']; ?></p>
              </div>
              <div class="col-md-6" align="right">
                <p>Email  : <?php echo $result['admin_email']; ?></p>
                <p>Phone  : <?php echo $result['admin_phone']; ?></p>
                <p>Join Date   : <?php echo $result['join_date']; ?></p>
                <p>Address     : <?php echo $result['admin_address']; ?></p>
              </div>
            </div>
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Your Post List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>SL</th>
                          <th>Post Name</th>
                          <th>Category</th>
                          <th>Category Level</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                      while($result2 = mysqli_fetch_assoc($run2)) {
                  ?>
                    <tr>
                      <td><?php echo $count++; ?></td>
                      <td><?php echo $result2['post_name']; ?></td>
                      <td><?php echo $result2['cate_name']; ?></td>
                      <td><?php echo $result2['cate_level_name']; ?></td>
                      <td><?php echo $result2['post_date']; ?></td>
                      <td>
                        <?php 
                          if ($result2['post_status'] == 1) {
                            ?>
                            <span class="badge badge-success">Active</span>
                            <?php
                          }else{
                            ?>
                            <span class="badge badge-warning">Deactive</span>
                            <?php
                          }
                         ?>
                      </td>
                      <td>
                          <?php 
                            if ($result2['post_status'] == 1) {
                              ?>
                              <form action="" method="post">
                                  <input type="hidden" name="post_id" value="<?php echo $result2['post_id']; ?>">
                                  <button class="btn btn-sm btn-warning" name="deactive">Off</button>
                                  <a class="btn btn-info btn-sm" href="post_view.php?post_id=<?php echo $result2['post_id']; ?>">View</a>
                                  <a class="btn btn-sm btn-primary" href="post_edit.php?post_id=<?php echo $result2['post_id']; ?>">Edit</a>
                                  <button class="btn btn-sm btn-danger" name="delete">Delete</button>
                              </form>
                              <?php
                            }else{
                              ?>
                              <form action="" method="post">
                                  <input type="hidden" name="post_id" value="<?php echo $result2['post_id']; ?>">
                                  <button class="btn btn-sm btn-success" name="active">On</button>
                                  <a href=""><button class="btn btn-sm btn-info">View</button></a>
                                  <a class="btn btn-sm btn-primary" href="post_edit.php?post_id=<?php echo $result['post_id']; ?>">Edit</a>
                                  <button class="btn btn-sm btn-danger" name="delete">Delete</button>
                              </form>
                              <?php
                            }
                           ?>  
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

            
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include ('../include/admin_footer.php'); ?>