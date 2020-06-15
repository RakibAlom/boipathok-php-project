<?php
 	include ('../include/admin_header.php'); 
 	include ('../include/dbcon.php');
 	$id = $_GET['categories'];
 	$sql = "SELECT categories.cate_name, categories_level.cate_level_name, post.* FROM post INNER JOIN categories ON categories.cate_id = post.cate_id INNER JOIN categories_level ON categories_level.cate_level_id = post.cate_level_id WHERE post.cate_id = '$id' ORDER BY post_id desc";
 	$run = mysqli_query($con,$sql);
 	$count = 1;
?>

<!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Post List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                 	<thead>
	                    <tr>
	                      	<th>SL</th>
	                      	<th>Post Name</th>
	                      	<th>Post Owner</th>
	                      	<th>Category Level</th>
	                      	<th>Date</th>
	                      	<th>Status</th>
	                      	<th>Action</th>
	                    </tr>
                 	</thead>
                 	<tbody>
                 	<?php while($result = mysqli_fetch_assoc($run)) { ?>
                 		<tr>
                 			<td><?php echo $count++; ?></td>
                 			<td><?php echo $result['post_name']; ?></td>
                 			<td><?php echo $result['post_owner']; ?></td>
		                    <td><?php echo $result['cate_level_name']; ?></td>
		                    <td><?php echo $result['post_date']; ?></td>
		                    <td>
		                        <?php 
		                          if ($result['post_status'] == 1) {
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
		                        if ($result['post_status'] == 1) {
		                        ?>
		                            <form action="" method="post">
		                                <input type="hidden" name="post_id" value="<?php echo $result['post_id']; ?>">
		                                <button class="btn btn-sm btn-warning" name="deactive">Off</button>
		                                <a class="btn btn-sm btn-info" href="post_view.php?post_id=<?php echo $result['post_id']; ?>">View</a>
		                                <a class="btn btn-sm btn-primary" href="post_edit.php?post_id=<?php echo $result['post_id']; ?>">Edit</a>
		                                <button class="btn btn-sm btn-danger" name="delete">Delete</button>
		                            </form>
		                        <?php
		                            }else{
		                        ?>
		                            <form action="" method="post">
		                                <input type="hidden" name="post_id" value="<?php echo $result['post_id']; ?>">
		                                <button class="btn btn-sm btn-success" name="active">On</button>
		                                <a class="btn btn-sm btn-info" href="post_view.php?post_id=<?php echo $result['post_id']; ?>">View</a>
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

<?php 
	if (isset($_POST['deactive'])) {
     	$post_id = $_POST['post_id'];
      	$sql = "UPDATE post SET post_status = '0' WHERE post_id = '$post_id'";
      	$run = mysqli_query($con,$sql);
  	}
  	if (isset($_POST['active'])) {
      	$post_id = $_POST['post_id'];
      	$sql = "UPDATE post SET post_status = '1' WHERE post_id = '$post_id'";
      	$run = mysqli_query($con,$sql);
	}
 	if (isset($_POST['delete'])) {
      	$post_id = $_POST['post_id'];
      	$sql = "DELETE FROM post WHERE post_id = '$post_id'";
      	$run = mysqli_query($con,$sql);
      	if ($run) {
      		?>
			<script>
				alert('Deleted Successfully');
			</script>
			<?php
      	}else{
      		?>
			<script>
				alert('Delete Failed');
			</script>
			<?php
      	}
    }

	include('../include/admin_footer.php'); 
?>