<?php
class Post {

   private $con;
   private $id;
   private $userObj;
   private $username;

   public function __construct($con, $user) {
      $this->con = $con;
      $this->username = $user;
      $this->userObj = new User($this->con, $user);
   }

   public function submitPost($body, $userTo) {
      $body = strip_tags($body);
      $body = mysqli_real_escape_string($this->con, $body);
      $checkIfEmpty = preg_replace('/\s+/', '', $body);

      if($checkIfEmpty != "") {
         $addedBy = $this->userObj->getUsername();
         $dateAdded = date("Y-m-d H:i:s");

         //if user posts on his own profile, userTo is none
         if($userTo = $addedBy) {
            $userTo = "none";
         }

         //insert post
         $query = mysqli_query($this->con, "INSERT INTO posts VALUES('', '$body', '$addedBy', '$userTo', '$dateAdded', 'no', 'no', '0', '0')");
         $returnedPostId = mysqli_insert_id($this->con);

         //TODO: insert notification

         //update user numPosts
         $numPosts = $this->userObj->getNumberOfPosts();
         $numPosts++;
         $updateQuery = mysqli_query($this->con, "UPDATE users SET numPosts='$numPosts' WHERE username='$this->username'");
      }
   }

   public function loadPosts($page, $limit) {
      if($page == 1) {
         $start = 0;
      }
      else {
         $start = ($page - 1) * $limit;
      }         

      $output = "";
      $data = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");
      
      if(mysqli_num_rows($data) > 0) {
         $numIterations = 0; //number of results checked
         $count = 1; //number of results loaded

         while($row = mysqli_fetch_array($data)) {
            $id = $row['id'];
            $body = $row['body'];
            $addedBy = $row['addedBy'];
            $userTo = $row['userTo'];
            $dateAdded = $row['dateAdded'];
            $likeCount = $row['likes'];
            $likeBtnColor = "#606770";
            $likeBtnText = "Like";
            
            $likeCount = likeCountString($likeCount);
            $commentCount = $row['commentCount'];
            $commentCount = commentCountString($commentCount);

            if($userTo == 'none') {
               $userTo = '';
            }
            else {
               $userToObj = new User($this->con, $userTo);
               $userToName = $userToObj->getFirstAndLastName();
               $userTo = "to <a href='" . $userTo . ">" . $userToName . "</a>";
            }

            //check if the user who posted has their account closed
            $addedByObj = new User($this->con, $addedBy);
            if($addedByObj->isClosed()) {
               continue;
            }
            $addedByProfilePic = $addedByObj->getProfilePic();
            $addedByFirstLastName = $addedByObj->getFirstAndLastName();

            if($this->userObj->isFriend($addedBy) == false)
               continue;
            if($numIterations++ < $start)
               continue;
            if($count++ > $limit)
               break;

            if(($this->checkIfLiked($id)) == true) {
               $likeBtnColor = "#d83f87";
               $likeBtnText = "Unlike";
            }

            // Timeframe
            $timeframe = calculateTimeframe($dateAdded);

            $output .= "<div class='postContainer'>
                           <div class='postHeader'>
                              <div class='postHeaderLeft'>
                                 <a href='$addedBy'>
                                    <img src='$addedByProfilePic'>
                                 </a>
                              </div>
                              <div class='postHeaderMain'>
                                 <a href='$addedBy'>$addedByFirstLastName</a>
                                 <a href='$userTo'>$userTo</a>
                                 <span class='timeframe'>$timeframe</span>
                              </div>
                           </div>
                           <div class='postBody'>
                              <p>$body</p>
                           </div>
                           <div class='postNumbers post$id'>
                              $likeCount
                              <div class='commentCountContainer'>
                                 <span class='postCommentCount' onclick='toggleCommentFrame($id)'>$commentCount</span>
                              </div>
                           </div>
                           <div class='postButtons'>
                              <div class='postLikeButton post$id' style='color: $likeBtnColor;' onclick='updateLikeBtn($id)'>
                                 <span>
                                    <i class='far fa-thumbs-up'></i>
                                    <span class='likeBtnText'>$likeBtnText</span>
                                 </span>
                              </div>
                              <div class='postCommentButton' onclick='toggleCommentFrame($id)'>
                                 <span>
                                    <i class='far fa-comment'></i>
                                    <span>Comment</span>
                                 </span>
                              </div>
                           </div>
                           <iframe class='frame' id='commentFrame$id' src='commentFrame.php?postId=$id' style='display: none;'></iframe>
                        </div><hr>";

         }//End While Loop 

         if($count > $limit) {
            $output .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
                           <input type='hidden' class='noMorePosts' value='false'>";
         }
         else {
            $output .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: center;'>No more posts!</p>";
         }
      } 

      echo $output;

   }//End loadPosts Function

   public function loadProfilePosts($page, $limit, $profUsername) {
      if($page == 1) {
         $start = 0;
      }
      else {
         $start = ($page - 1) * $limit;
      }         

      $output = "";
      $data = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' AND ((userTo='$profUsername') OR (addedBy='$profUsername' AND userTo='none')) ORDER BY id DESC");
      
      if(mysqli_num_rows($data) > 0) {
         $numIterations = 0; //number of results checked
         $count = 1; //number of results loaded

         while($row = mysqli_fetch_array($data)) {
            $id = $row['id'];
            $body = $row['body'];
            $addedBy = $row['addedBy'];
            $userTo = $row['userTo'];
            $dateAdded = $row['dateAdded'];
            $likeCount = $row['likes'];
            $likeBtnColor = "#606770";
            $likeBtnText = "Like";
            
            $likeCount = likeCountString($likeCount);
            $commentCount = $row['commentCount'];
            $commentCount = commentCountString($commentCount);

            if($userTo == 'none') {
               $userTo = '';
            }
            else {
               $userToObj = new User($this->con, $userTo);
               $userToName = $userToObj->getFirstAndLastName();
               $userTo = "to <a href='" . $userTo . ">" . $userToName . "</a>";
            }

            //check if the user who posted has their account closed
            $addedByObj = new User($this->con, $addedBy);
            if($addedByObj->isClosed()) {
               continue;
            }
            $addedByProfilePic = $addedByObj->getProfilePic();
            $addedByFirstLastName = $addedByObj->getFirstAndLastName();

            if($numIterations++ < $start)
               continue;
            if($count++ > $limit)
               break;

            if(($this->checkIfLiked($id)) == true) {
               $likeBtnColor = "#d83f87";
               $likeBtnText = "Unlike";
            }

            // Timeframe
            $timeframe = calculateTimeframe($dateAdded);

            $output .= "<div class='postContainer'>
                           <div class='postHeader'>
                              <div class='postHeaderLeft'>
                                 <a href='$addedBy'>
                                    <img src='$addedByProfilePic'>
                                 </a>
                              </div>
                              <div class='postHeaderMain'>
                                 <a href='$addedBy'>$addedByFirstLastName</a>
                                 <a href='$userTo'>$userTo</a>
                                 <span class='timeframe'>$timeframe</span>
                              </div>
                           </div>
                           <div class='postBody'>
                              <p>$body</p>
                           </div>
                           <div class='postNumbers post$id'>
                              $likeCount
                              <div class='commentCountContainer'>
                                 <span class='postCommentCount' onclick='toggleCommentFrame($id)'>$commentCount</span>
                              </div>
                           </div>
                           <div class='postButtons'>
                              <div class='postLikeButton post$id' style='color: $likeBtnColor;' onclick='updateLikeBtn($id)'>
                                 <span>
                                    <i class='far fa-thumbs-up'></i>
                                    <span class='likeBtnText'>$likeBtnText</span>
                                 </span>
                              </div>
                              <div class='postCommentButton' onclick='toggleCommentFrame($id)'>
                                 <span>
                                    <i class='far fa-comment'></i>
                                    <span>Comment</span>
                                 </span>
                              </div>
                           </div>
                           <iframe class='frame' id='commentFrame$id' src='commentFrame.php?postId=$id' style='display: none;'></iframe>
                        </div><hr>";

         }//End While Loop 

         if($count > $limit) {
            $output .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
                           <input type='hidden' class='noMorePosts' value='false'>";
         }
         else {
            $output .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: center;'>No more posts!</p>";
         }
      } 

      echo $output;

   }//End loadPosts Function

   public function checkIfLiked($postId) {
      //function that checks if the post has already been liked by user who is logged in
      $query = mysqli_query($this->con, "SELECT * FROM likes WHERE username='$this->username' AND postId='$postId'");
      $count = mysqli_num_rows($query);
      if($count == 1)
         return true;

      return false;
   }

}

?>