<?php
	include ('../include/admin_header.php'); 
	include ('../include/dbcon.php');
	$count = 1;
	$sql = "SELECT * FROM subscribe";
	$run = mysqli_query($con,$sql);
?>

<div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Subscribe List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                 	<thead>
	                    <tr>
	                      	<th>SL</th>
	                      	<th>Email</th>
	                      	<th>Action</th>
	                    </tr>
                 	</thead>
                 	
                 	<tbody>
                 		<?php while($result = mysqli_fetch_assoc($run)) { ?>
                 		<tr>
                 			<td><?php echo $count++; ?></td>
                 			<td><?php echo $result['subscribe_email']; ?></td>
                 			<td>
                 				<form action="" method="POST">
                 					<input type="hidden" name="id" value="<?php echo $result['subscribe_id']; ?>">
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
		$id = $_POST['id'];
		$sql = "DELETE FROM subscribe WHERE subscribe_id = '$id'";
		$run = mysqli_query($con,$sql);
		if ($run) {
			?>
			<script>
				alert('Delete Subscriber');
				window.open('subscribe.php','_self');
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