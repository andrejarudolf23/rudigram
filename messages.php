<?php 
include 'includes/header.php';
$message = new Message($con, $userLoggedIn);

if(isset($_GET['u'])) {
   $userTo = $_GET['u'];
   $userToObj = new User($con, $userTo);
}
else {
   $userTo = $message->getMostRecentUser();
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
            //if logged in user didnt have any chat at all, display this
            if($userTo == 'none') {
               ?> 
               <div class='noMessagesFound'>
                  <span>No messages found.</span>
               </div>;
               <?php
            }
            else {
               $user->loadAndDisplayChats();
            }                     
            ?>
         </div>
      </div>
   </div>
   <div class="centralPageContainer">

   </div>
</div>