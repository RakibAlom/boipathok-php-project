<?php
	 include ('../include/admin_header.php'); 
	 include ('../include/dbcon.php');

	 $count = 1;
	 $sql = "SELECT * FROM admin";
	 $run = mysqli_query($con,$sql);
?>

<!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Admin DataTables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      	<th>SL</th>
                      	<th>Name</th>
                      	<th>Phone</th>
                      	<th>Gender</th>
                      	<th>Email</th>
                        <th>Join</th>
                      	<th>Image</th>
                     	<th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                <?php while($result = mysqli_fetch_assoc($run)) { ?>
                    <tr>
                    	<td><?php echo $count++; ?></td>
                    	<td><?php echo $result['admin_name']; ?></td>
                    	<td><?php echo $result['admin_phone']; ?></td>
                    	<td><?php echo $result['admin_gender']; ?></td>
                    	<td><?php echo $result['admin_email']; ?></td>
                      <td><?php echo $result['join_date']; ?></td>
                    	<td><img style="width: 50px; height: 50px;" class="img-profile rounded-circle" src="../img/admin/<?php echo $result['admin_image'] ?>"></td>
                    	<td>
                        <form action="" method="POST">
                    		  <a href="admin_view.php?admin_id=<?php echo $result['admin_id']; ?>" class="btn btn-success btn-sm">view</a>
                          <a href="admin_edit.php?admin_id=<?php echo $result['admin_id']; ?>" class="btn btn-primary btn-sm">edit</a>
                          <input type="hidden" name="admin_id" value="<?php echo $result['admin_id']; ?>">
                          <button class="btn btn-sm btn-danger" name="remove">Remove</button>
                        </form>
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

<?php 
  if (isset($_POST['remove'])) {
    $id = $_POST['admin_id'];
    $sql = "DELETE FROM admin WHERE admin_id = '$id'";
    $run = mysqli_query($con,$sql);
    if ($run) {
      ?>
      <script>
        alert('Delete Admin');
        window.open('admin_list.php','_self');
      </script>
      <?php
    }else{
      ?>
      <script>
        alert('Failed to Delete');
      </script>
      <?php
    }
  }
  include ('../include/admin_footer.php'); 
?>