<?php include 'includes/header.php'; ?>

<?php
   if(isset($_POST['statusBtn'])) {
      $post = new Post($con, $userLoggedIn);
      $post->submitPost($_POST['statusInput'], 'none');
   }
?>
<div class="container">
   <?php include 'includes/userDetailsContainer.php'; ?>
   <?php include 'includes/newsfeedContainer.php'; ?>
</div>
<?php include 'includes/footer.php'; ?>

   