<?php 
    include ('../include/admin_header.php'); 
    include ('../include/dbcon.php');
    $id = $_GET['post_id'];
    $sql = "SELECT * FROM post WHERE post_id = '$id'";
    $run = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($run);
?>

<!-- Page Wrapper -->
<div id="wrapper">
	<!-- Begin Page Content -->
    <div class="container-fluid">
    	<form action="" method="post" enctype="multipart/form-data">

    		<div class="form-group">
    			<label>Post Name</label>
    			<input class="form-control" type="text" name="post_name" value="<?php echo $result['post_name']; ?>">
    		</div>
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
                             <option <?php if ($categories['cate_id'] == $result['cate_id']) {
                                 echo "selected";
                             } ?> value="<?php echo $categories['cate_id'] ?>"><?php echo $categories['cate_name']; ?></option>
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
                             <option <?php if ($categories_level['cate_level_id'] == $result['cate_level_id']) {
                                 echo "selected";
                             } ?> value="<?php echo $categories_level['cate_level_id']; ?>"><?php echo $categories_level['cate_level_name']; ?></option>
                         <?php } ?>
    					</select>
    				</div>
    			</div>
    		</div>
            <div class="form-group">
                <label>Post</label>
                <textarea class="form-control" name="post_text" style="height: 160px;"><?php echo $result['post_text']; ?></textarea>
            </div>
            <button class="btn btn-block btn-primary btn-lg" name="submit">Update Post</button>
    	</form>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
  

<?php
    if (isset($_POST['submit'])) {
        $post_name = $_POST['post_name'];
        $post_categories = $_POST['post_categories'];
        $post_categories_level = $_POST['post_categories_level'];
        $post_text = $_POST['post_text'];


        $sql = "UPDATE post SET post_name = '$post_name', cate_id = '$post_categories', cate_level_id = '$post_categories_level', post_text = '$post_text' WHERE post_id = '$id'";
        $run = mysqli_query($con,$sql);
         if ($run) {
            ?>
                <script>
                    swal('Successfully Updated','Please, Reload This Page!','success');
                 </script>
            <?php
        }else{
            ?>
                <script>swal('Sorry','Update Failed!','error');</script>
            <?php
        }

    }

    include ('../include/admin_footer.php'); 
 ?>

