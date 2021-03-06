<?php include 'includes/header.php' ?>
   <div class="container">
      <div class="requestMain column">
         <h2>Friend Requests</h1>
         <?php
         $query = mysqli_query($con, "SELECT * FROM friend_requests WHERE userTo = '$userLoggedIn'");
         $count = mysqli_num_rows($query);

         if($count == 0) {
            echo "You have no friend requests at the moment.";
            exit();
         }

         while($row = mysqli_fetch_array($query)) {
            $userFrom = $row['userFrom'];
            $userFromObj = new User($con, $userFrom);
            $userFullName = $userFromObj->getFirstAndLastName();
            $userProfilePic = $userFromObj->getProfilePic();

            echo "<div class='userRequestContainer'>
                     <div class='userRequestTop'>
                        <div class='userRequestImg'>
                           <img src='$userProfilePic' alt='User profile pic'>
                        </div>
                        <div class='requestText'>
                           <a href='$userFrom'>$userFullName</a> sent you a friend request.
                        </div>
                     </div>
                     <div class='userRequestBottom'>
                        <button class='btn btnGreen' onclick='acceptRequest(\"$userFrom\")'>Accept</button>
                        <button class='btn btnRed' onclick='declineRequest(\"$userFrom\")'>Decline</button>
                     </div>
                  </div><hr>";
         }

         ?>
      </div>
   </div>
   <!-- Local JS requests.js -->
   <script src="assets/js/requests.js"></script>
</body>
</html>