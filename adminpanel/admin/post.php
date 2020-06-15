<?php 
    include ('../include/admin_header.php'); 
    include ('../include/dbcon.php');
    $owner_id = $_SESSION['email'];
?>

<!-- Page Wrapper -->
<div id="wrapper">
	<!-- Begin Page Content -->
    <div class="container-fluid">
    	<form action="" method="post" enctype="multipart/form-data">

    		<div class="form-group">
    			<label>Post Name</label>
    			<input class="form-control" type="text" name="post_name" required="">
    		</div>
            <input type="hidden" name="post_owner" value="<?php echo $_SESSION['name']; ?>">
    		<div class="row">
    			<div class="col-md-4">
    				<div class="form-group">
    					<label>Post Category</label>
    					<select class="form-control" name="post_categories">
    						<?php 
                                $sql = "SELECT * FROM categories WHERE cate_status = '1'";
                                $run = mysqli_query($con,$sql);
                                while($categories = mysqli_fetch_assoc($run)){
                             ?>
                             <option value="<?php echo $categories['cate_id'] ?>"><?php echo $categories['cate_name']; ?></option>
                         <?php } ?>
    					</select>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="form-group">
    					<label>Post Label</label>
    					<select class="form-control" name="post_categories_level">
    						<?php 
                                $sql = "SELECT * FROM categories_level WHERE cate_level_status = '1'";
                                $run = mysqli_query($con,$sql);
                                while($categories_level = mysqli_fetch_assoc($run)){
                             ?>
                             <option value="<?php echo $categories_level['cate_level_id']; ?>"><?php echo $categories_level['cate_level_name']; ?></option>
                         <?php } ?>
    					</select>
    				</div>
    			</div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Upload Image (Optional)</label>
                        <input type="file" name="image" class="alert-secondary">
                    </div>
                </div>
    		</div>
            <div class="form-group">
                <label>Post</label>
                <textarea class="form-control" name="post_text" style="height: 160px;" required=""></textarea>
            </div>
            <input type="hidden" name="post_date">
            <input type="hidden" name="post_status" value="1">
            <?php 
            	$sql = "SELECT * FROM admin WHERE admin_email = '$owner_id'";
            	$run = mysqli_query($con,$sql);
            	$result = mysqli_fetch_assoc($run);

            	if ($owner_id == $result['admin_email']) {
            		?>
            			<input type="hidden" name="admin_id" value="<?php echo $result['admin_id']; ?>">
            		<?php
            	}else{
            		?>
            			<input type="hidden" name="admin_id" value="0">
            		<?php
            	}
             ?>
             <?php 
             	$sql = "SELECT * FROM user";
             	$run = mysqli_query($con,$sql);
             	$result = mysqli_fetch_assoc($run);

             	if ($owner_id == $result['user_email']) {
             		?>
             			<input type="hidden" name="user_id" value="<?php echo $result['user_id']; ?>">
             		<?php
             	}else{
             		?>
             			<input type="hidden" name="user_id" value="0">
             		<?php
             	}
              ?>
            <button class="btn btn-block btn-primary btn-lg" name="submit">Post Submit</button>
    	</form>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
  

<?php
    if (isset($_POST['submit'])) {
        $post_name = $_POST['post_name'];
        $post_owner = $_POST['post_owner'];
        $post_categories = $_POST['post_categories'];
        $post_categories_level = $_POST['post_categories_level'];
        $post_text = $_POST['post_text'];
        $post_date = date('d,F,Y h:i a');
        $post_status = $_POST['post_status'];
        $admin_id = $_POST['admin_id'];
        $user_id = $_POST['user_id'];

        $post_image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $upload_path = '../img/post/';
        $upload_check = move_uploaded_file($tmp, $upload_path.$post_image);

                $sql = "INSERT INTO post (post_name,post_owner,cate_id,cate_level_id,post_text,post_image,post_date,post_status,admin_id,user_id) VALUES ('$post_name','$post_owner','$post_categories','$post_categories_level','$post_text','$post_image','$post_date','$post_status','$admin_id','$user_id')";
                $run = mysqli_query($con,$sql);
                if ($run) {
                    ?>
                    <script>swal('Successfully Posted','','success');</script>
                    <?php
                }else{
                    ?>
                    <script>swal('Sorry','Failed to Post!','error');</script>
                    <?php
                }

    }

    include ('../include/admin_footer.php'); 
 ?>

