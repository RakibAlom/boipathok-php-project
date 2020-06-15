<?php 
	include('../include/admin_header.php'); 
	include('../include/dbcon.php');

	$count = 1;
	$sql = "SELECT * FROM categories";
	$run = mysqli_query($con,$sql);
?>

<!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Categories DataTables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                 	<thead>
	                    <tr>
	                      	<th>SL</th>
	                      	<th>Name</th>
	                      	<th>Status</th>
	                      	<th>Action</th>
	                    </tr>
                 	</thead>
              
                 	<tbody>
                 	<?php while($result = mysqli_fetch_assoc($run)) { ?>
	                    <tr>
	                    	<td><?php echo $count++; ?></td>
	                    	<td><?php echo $result['cate_name']; ?></td>
	                    	<td>
	                    		<?php 
	                    			if ($result['cate_status'] == 1) {
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
	                    			if ($result['cate_status'] == 1) {
	                    				?>
	                    				<form action="" method="POST">
	                    					<input type="hidden" name="cate_id" value="<?php echo $result['cate_id']; ?>">
	                    					<button class="btn btn-warning btn-sm" name="deactive">Deactive</button>
	                    					<button class="btn btn-danger btn-sm" name="delete">Delete</button>
	                    				</form>
	                    				<?php
	                    			}else{
	                    				?>
	                    				<form action="" method="POST">
	                    					<input type="hidden" name="cate_id" value="<?php echo $result['cate_id']; ?>">
	                    					<button class="btn btn-success btn-sm" name="active">Active</button>
	                    					<button class="btn btn-danger btn-sm" name="delete">Delete</button>
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
		$id = $_POST['cate_id'];
		$sql = "UPDATE categories SET cate_status = '0' WHERE cate_id = '$id'";
		$run = mysqli_query($con,$sql);
		?>
			<script>window.open('categories_list.php','_self');</script>
		<?php
	}
	if (isset($_POST['active'])) {
		$id = $_POST['cate_id'];
		$sql = "UPDATE categories SET cate_status = '1' WHERE cate_id = '$id'";
		$run = mysqli_query($con,$sql);
		?>
			<script>window.open('categories_list.php','_self');</script>
		<?php
	}

	if(isset($_POST['delete'])){
		$id = $_POST['cate_id'];
		$sql = "DELETE FROM categories WHERE cate_id = '$id'";
		$run = mysqli_query($con,$sql);
		if ($run) {
			?>
				<script>
					alert('Delete Successfull!');
					window.open('categories_list.php','_self');
				</script>
			<?php
		}else{
			?>
			<script>
				alert('Delete Failed!');
				window.open('categories_list.php','_self');
			</script>
		<?php
		}
	}



	include('../include/admin_footer.php'); 
?>