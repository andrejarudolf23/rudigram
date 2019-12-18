<?php 
   require 'includes/config.php'; 
   include 'includes/classes/User.php';
   include 'includes/classes/Post.php';
   include 'includes/functions/functions.php';
   
   if(isset($_SESSION['userLoggedIn'])) {
      $userLoggedIn = $_SESSION['userLoggedIn'];
      $user = new User($con, $userLoggedIn);
      echo "<script>userLoggedIn='$userLoggedIn'</script>";
   }
   else {
      header("Location: register.php");
   }
?>

<?php
   if(!isset($_GET['postId'])) {
      echo 'postId not set. Check Post.php(loadPosts function)';
      exit();
   }
   $postId = $_GET['postId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="assets/css/commentFrame.css">
   <title>Document</title>
</head>

<!-- insert comments -->
<?php
   if(isset($_POST['submitComment'])) {
      $postDetails = mysqli_query($con, "SELECT addedBy, commentCount FROM posts WHERE id='$postId'");
      $row = mysqli_fetch_array($postDetails);
      $commentCount = $row['commentCount'] + 1;

      $commentBody = $_POST['commentBody'];
      $commentBody = mysqli_escape_string($con, $commentBody);
      $postedTo = $row['addedBy'];
      $dateAdded = date("Y-m-d H:i:s");

      $insertComment = mysqli_query($con, "INSERT INTO comments VALUES ('', '$commentBody', '$userLoggedIn', '$postedTo', '$dateAdded', 'no', '$postId')");
      
      $updateCommentCount = mysqli_query($con, "UPDATE posts SET commentCount='$commentCount' WHERE id='$postId'");
   }   
?>

<body>
   <div class="commentSectionTop">
      <div class="userCommentLeft">
         <img src="<?php echo $user->getProfilePic(); ?>">
      </div>
      <form action="commentFrame.php?postId=<?php echo $postId; ?>" method="POST">
         <input type="text" name="commentBody" class="commentBody" placeholder="Write a comment..." required="" autocomplete="off">
         <input type="submit" name="submitComment" value="Post" class="submitComment" onclick="updateCommentCount(<?php echo $postId; ?>)">
      </form>
   </div>
<!-- Displaying comments -->
<?php
   $getComments = mysqli_query($con, "SELECT * FROM comments WHERE postId='$postId' AND removed='no' ORDER BY id ASC");
   $count = mysqli_num_rows($getComments);

   if($count != 0) {
      echo "<ul class='commentList'>";
      while($comment = mysqli_fetch_array($getComments)) {
         $commentBody = $comment['commentBody'];
         $postedBy = $comment['postedBy'];
         $dateAdded = $comment['dateAdded'];
         $timeframe = calculateCommentTimeframe($dateAdded);
         $user = new User($con, $postedBy);
         ?>
         <li>
            <div class="commentRow">
               <div class="commentRowLeft">
                  <a href="<?php echo $user->getUsername(); ?>">
                     <img src="<?php echo $user->getProfilePic(); ?>" alt="userProfPic"> 
                  </a>
               </div>
               <div class="commentRowMid">
                  <a href="<?php echo $user->getUsername(); ?>" target="_parent">
                     <span><?php echo $user->getFirstAndLastName(); ?></span> 
                  </a>
                  <div class="commentInfo">
                     <span class="commentLike">Like</span>
                     <span class="timeframe"><?php echo $timeframe; ?></span>
                  </div>
               </div>
               <div class="commentText">
                  <span><?php echo $commentBody; ?></span>
               </div>   
            </div>            
         </li>
         <?php
      }
      echo "</ul>";
   }
   
?>
<!-- jQuery CDN -->
<script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous">
</script>
<!-- Local JS -->
<script src="assets/js/commentFrame.js"></script>
</body>
</html>