function removeFriend(username) {
   $.post("includes/handlers/ajax/ajaxRemoveFriend.php", { userFrom: userLoggedIn, userToRemove: username })
   .done(function() {
      location.reload();
   });
}

function addFriend(username) {
   $.post("includes/handlers/ajax/ajaxAddFriend.php", { user: userLoggedIn, userToAdd: username})
   .done(function() {
      location.reload();
   });
}
