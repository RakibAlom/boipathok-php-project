<?php 
	include ('../include/admin_header.php'); 
	include ('../include/dbcon.php');
	$id = $_GET['post_id'];
	$sql = "SELECT categories.cate_name,categories_level.cate_level_name, post.* FROM post INNER JOIN categories ON categories.cate_id = post.cate_id INNER JOIN categories_level ON categories_level.cate_level_id = post.cate_level_id WHERE post_id = '$id'";
	$run = mysqli_query($con,$sql);
	$result = mysqli_fetch_assoc($run);
?>
<!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

	        <div class="col-md-8 offset-2 mt-4 mb-4">
	        	<span><?php echo $result['cate_name']; ?> / <?php echo $result['cate_level_name']; ?></span><span class="float-right"><?php echo $result['post_date']; ?></span>
	        	<h1 class="text-dark font-weight-bold"><?php echo $result['post_name']; ?></h1>
	        	<h5><?php echo $result['post_owner']; ?></h5>
	        	<?php if($result['post_image'] == null){
	        	}else{
	        	 ?>
	        	 <div class="text-center">
	        	 	<img class="img-fluid mt-4 center" style="width: 100%;height: 340px;" src="../img/post/<?php echo $result['post_image']; ?>">
	        	 </div>
	        	<?php } ?>
	        	<p class="mt-4 text-dark"><?php echo $result['post_text']; ?></p>

	        	<a class="btn btn-sm btn-primary mt-4" href="post_edit.php?post_id=<?php echo $result['post_id']; ?>">Edit Post</a>
	        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include ('../include/admin_footer.php'); ?>