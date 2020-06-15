<?php
	include ('../include/admin_header.php'); 
	include ('../include/dbcon.php'); 
	$count = 1;
	$sql = "SELECT * FROM contact";
	$run = mysqli_query($con,$sql);
?>
	<!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Message List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                 	<thead>
	                    <tr>
	                      	<th>SL</th>
	                      	<th>Name</th>
	                      	<th>Email</th>
	                      	<th>Action</th>
	                    </tr>
                 	</thead>
                 	<?php while($result = mysqli_fetch_assoc($run)) { ?>
                 	<tbody>
                 			<td><?php echo $count++; ?></td>
                 			<td><?php echo $result['contact_name']; ?></td>
                 			<td><?php echo $result['contact_email']; ?></td>
                 			<td>
                 				<form action="" method="POST">
                 					<a class="btn btn-sm btn-primary" href="contact_single.php?message=<?php echo $result['contact_id']; ?>">View</a>
                 					<input type="hidden" name="contact_id" value="<?php echo $result['contact_id']; ?>">
                 					<button class="btn btn-danger btn-sm" name="remove">Remove</button>
                 				</form>

                 			</td>
                 	</tbody>
                 	<?php } ?>
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
		$id = $_POST['contact_id'];
		$sql = "DELETE FROM contact WHERE contact_id = '$id'";
		$run = mysqli_query($con,$sql);
		if ($run) {
			?>
			<script>
				alert('Delete Message');
				window.open('contact.php','_self');
			</script>
			<?php
		}else{
			?>
			<script>
				alert('Message Delete Failed');
			</script>
			<?php
		}
	}

	include ('../include/admin_footer.php'); 
?>