function removeFriend(username) {
   $.post("includes/handlers/ajax/ajaxRemoveFriend.php", { userFrom: userLoggedIn, userToRemove: username })
   .done(function() {
      location.reload();
   });
}

