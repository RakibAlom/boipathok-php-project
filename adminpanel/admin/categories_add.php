<?php include('../include/admin_header.php'); ?>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create New Categories</h1>
                <hr>
              </div>
              <form class="user" action="" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="cate_name" placeholder="enter name" name="cate_name" required="">
                </div>
                  <input type="hidden" name="cate_status" value="1">
                <button class="btn btn-primary btn-user btn-block" name="submit">
                  Submit
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php 
	if (isset($_POST['submit'])) {
		$name = $_POST['cate_name'];
    $cate_status = $_POST['cate_status'];
		include ('../include/dbcon.php');

		$sql = "INSERT INTO categories(cate_name,cate_status) VALUES ('$name','$cate_status')";
		$run = mysqli_query($con,$sql);
		if ($run) {
			?>
				<script>swal('Success','New Categories Add!','success');</script>
			<?php
		}else{
      ?>
        <script>swal('Failed','Categories Added Failed!','error');</script>
      <?php
    }
	}

	include('../include/admin_footer.php'); 
?>