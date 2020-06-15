<?php 
	$id = $_GET['admin_id'];
	include '../include/dbcon.php';
	$sql = "DELETE FROM admin WHERE admin_id = '$id'";
	$run = mysqli_query($con,$sql);
	if ($run) {
		?>
			<script>
				alert('Admin Removed Successfully');
				window.open('admin_list.php','_self');
			</script>
		<?php
	}else{
		?>
			<script>
				alert('Removed Failed!');
				window.open('admin_list.php','_self');
			</script>
		<?php
	}
?>