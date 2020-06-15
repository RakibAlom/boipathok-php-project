<?php 
	include('../include/admin_header.php'); 
	include('../include/dbcon.php');

	$count = 1;
	$sql = "SELECT categories.cate_name, categories_level.* FROM categories_level INNER JOIN categories ON categories.cate_id = categories_level.cate_id";
	$run = mysqli_query($con,$sql);
?>

<!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Categories Level List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                 	<thead>
	                    <tr>
	                      	<th>SL</th>
	                      	<th>Categories</th>
	                      	<th>Categories Level</th>
	                      	<th>Status</th>
	                      	<th>Action</th>
	                    </tr>
                 	</thead>
                 	<tbody>
                 	<?php while($result = mysqli_fetch_assoc($run)){ ?>
                 		<tr>
                 			<td><?php echo $count++; ?></td>
                 			<td><?php echo $result['cate_name']; ?></td>
                 			<td><?php echo $result['cate_level_name']; ?></td>
                 			<td>
                 				<?php 
                 					if ($result['cate_level_status'] == 1) {
                 						?>
                 							<span class="badge badge-success">Active</span>
                 						<?php
                 					}else{
                 						?>
                 							<span class="badge badge-danger">Deactive</span>
                 						<?php
                 					}
                 				 ?>
                 			</td>
                 			<td>
                 				<?php 
                 					if($result['cate_level_status'] == 1){
                 						?>
                 						<form action="" method="POST">
                 							<input type="hidden" name="cate_level_id" value="<?php echo $result['cate_level_id']; ?>">
                 							<button class="btn btn-sm btn-warning" name="deactive">Deactive</button>
                 							<button class="btn btn-sm btn-danger" name="delete">Delete</button>
                 						</form>
                 						<?php
                 					}else{
                 						?>
                 						<form action="" method="POST">
                 							<input type="hidden" name="cate_level_id" value="<?php echo $result['cate_level_id']; ?>">
                 							<button class="btn btn-sm btn-success" name="active">Active</button>
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
	if(isset($_POST['deactive'])){
		$cate_id = $_POST['cate_level_id'];
		$sql = "UPDATE categories_level SET cate_level_status = '0' WHERE cate_level_id = '$cate_id'";
		$run = mysqli_query($con,$sql);
		echo "<script>window.open('categories_level_list.php','_self');</script>";
	}
	if (isset($_POST['active'])) {
		$cate_id = $_POST['cate_level_id'];
		$sql = "UPDATE categories_level SET cate_level_status = '1' WHERE cate_level_id = '$cate_id'";
		$run = mysqli_query($con,$sql);
		echo "<script>window.open('categories_level_list.php','_self');</script>";
	}
	if (isset($_POST['delete'])) {
		$cate_id = $_POST['cate_level_id'];
		$sql = "DELETE FROM categories_level WHERE cate_level_id = '$cate_id'";
		$run = mysqli_query($con,$sql);
		if ($run) {
			?>
				<script>
					alert('Delete Successfull!');
					window.open('categories_level_list.php','_self');
				</script>
			<?php
		}else{
			?>
				<script>
					alert('Delete Failed!');
					window.open('categories_level_list.php','_self');
				</script>
			<?php
		}
	}

	include ('../include/admin_footer.php');
 ?>