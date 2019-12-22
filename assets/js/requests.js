function declineRequest(userFrom) {
   $.post("includes/handlers/ajax/ajaxDeclineRequest.php", { userLoggedIn: userLoggedIn, userFrom: userFrom })
   .done(function() {
      location.reload();
   });
}

function acceptRequest(userFrom) {
   $.post("includes/handlers/ajax/ajaxAcceptRequest.php", { userLoggedIn: userLoggedIn, userFrom: userFrom })
   .done(function() {
      location.reload();
   });
}