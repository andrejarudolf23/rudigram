<?php 
include 'includes/header.php';
$message = new Message($con, $userLoggedIn);

if(isset($_GET['u'])) {
   $userTo = $_GET['u'];
   $userToObj = new User($con, $userTo);
}
else {
   $userTo = $message->getMostRecentUser();
   $userToObj = new User($con, $userTo);
}

if(isset($_POST['submitMessage'])) {
   $messageBody = $_POST['messageBody'];
   $messageBody = mysqli_real_escape_string($con, $messageBody);
   $message->sendMessage($userTo, $messageBody);
}

?>
<div id="messagePageWrapper">
   <div class="chatsBarContainer">
      <div class="chatsBarHeader">
         <div class="headerLeftPart">
            <div class="userImg">
               <img src="<?php echo $user->getProfilePic(); ?>" alt="User profile pic">
            </div>
            <h1>Chats</h1>
         </div>
         <div class="headerNewMsgBtn">
            <a href="messages.php?u=new"><i class="fas fa-edit fa-lg"></i></a>
         </div>
      </div>
      <div class="chatsBarMain">
         <div class="chatSearchContainer">
            <label class="search">
               <img src="assets/images/icons/search.png" alt="">
               <input type="text" placeholder="Search Chats" autocomplete="off" id="chatSearch">
            </label>
         </div>
         <div class="chatsContainer">
            <?php
            //if logged in user didnt exchange any message at all with anyone, display this
            if($userTo == 'none') {
               ?> 
               <div class='noMessagesFound'>
                  <span>No messages found.</span>
               </div>;
               <?php
            }
            else {
               $message->loadAndDisplayChats();
            }                     
            ?>
         </div>
      </div>
   </div>
   <div class="centralPageContainer">
      <?php if($userTo=='none') exit(); ?>
      <div class="pageHeading">
         <img src="<?php echo $userToObj->getProfilePic(); ?>" alt="user prof pic">
         <div class="friendInfo">
            <h2><?php echo $userToObj->getFirstAndLastName(); ?></h2>
            <span>
               <?php
                  if($user->isFriend($userTo))
                     echo "You're friends on Rudigram";
                  else
                     echo "You're not friends on Rudigram";
               ?>
            </span>
         </div>         
      </div>
      <div class="centralMain">
         <div class="messagesContainer">
            <div class="loadedMessages">
               <?php echo $message->displayMessages($userTo); ?>
            </div>
            <div class="messagePost">
               <form action="" method="POST">
                  <input type="text" name="messageBody" id="messageBody" placeholder="Type a message..." required="" autocomplete="off">
                  <input type="submit" name="submitMessage" id="submitMessage" value="Send">
               </form>
            </div>
         </div>
         <div class="rightPageContainer">
            <img src="<?php echo $userToObj->getProfilePic(); ?>" alt="User profile pic">
            <h2><a href="profile.php?<?php echo $userTo ?>"><?php echo $userToObj->getFirstAndLastName(); ?></a></h2>
            <span>
               <?php
                  $mutualFriends = $user->getNumOfMutualFriends($userTo);
                  if(!$user->isFriend($userTo))
                     echo "$mutualFriends";
                  else
                     echo 'Friends on Rudigram';
               ?>
            </span>
         </div>
      </div>
   </div>
</div>
<!-- LOCAL messages.js -->
<script src="assets/js/messages.js"></script>
</body>