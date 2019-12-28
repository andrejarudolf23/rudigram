<?php include 'includes/header.php'; ?>
<div class="container">
   <div class="accountSettings column">
      <h2>Account Settings</h2>
      <h3><?php echo $user->getFirstAndLastName(); ?></h3>
      <div class="changeImgContainer">
         <img src="<?php echo $user->getProfilePic(); ?>" alt="User profile pic" id="smallProfPic">
         <a href="upload.php">Upload new profile picture</a>
      </div>
   </div>
</div>