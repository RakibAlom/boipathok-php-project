<?php include('../include/admin_header.php'); ?>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create New Categories Level</h1>
                <hr>
              </div>
              <form class="user" action="" method="POST">
                <div class="form-group">
                  <select class="form-control" name="cate_id">

                    <?php 
                          include ('../include/dbcon.php');
                          $sql = "SELECT * FROM Categories WHERE cate_status = '1'";
                          $run = mysqli_query($con,$sql);
                          while($result = mysqli_fetch_assoc($run)){
                       ?>
                       <option value="<?php echo $result['cate_id']; ?>">
                          <?php echo $result['cate_name']; ?>
                       </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="enter level name" name="cate_level_name" required="">
                </div>
                  <input type="hidden" name="cate_level_status" value="1">
                <button class="btn btn-primary btn-user btn-block" name="submit">
                  Submit
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
    $cate_id = $_POST['cate_id'];
    $cate_level_name = $_POST['cate_level_name'];
    $cate_level_status = $_POST['cate_level_status'];
		include ('../include/dbcon.php');

		$sql = "INSERT INTO categories_level(cate_id,cate_level_name,cate_level_status) VALUES ('$cate_id','$cate_level_name','$cate_level_status')";
		$run = mysqli_query($con,$sql);
		if ($run) {
			?>
				<script>swal('Success','New Level Add!','success');</script>
			<?php
		}else{
      ?>
        <script>swal('Failed','Level Added Failed!','error');</script>
      <?php
    }
	}

	include('../include/admin_footer.php'); 
?>