<?php include 'includes/header.php'; ?>

<?php
   if(isset($_POST['statusBtn'])) {
      $post = new Post($con, $userLoggedIn);
      $post->submitPost($_POST['statusInput'], 'none');
   }
?>

<?php include 'includes/userDetailsContainer.php'; ?>

<?php include 'includes/newsfeedContainer.php'; ?>

<?php include 'includes/footer.php'; ?> 

   