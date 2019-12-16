<nav id="navbar">
   <h1 class="logo"><a href="index.php">RUDIGRAM</a></h1>
   <div class="searchBar">
      <form action="search.php" method="GET" name="searchForm">
         <input type="text" name="searchInput" id="searchInput" placeholder="Search...">
         <div class="btnHolder">
            <img src="assets/images/icons/search.png" alt="search">
         </div>
      </form>
   </div>
   <div class="userOptions">
      <div class="profileIcon">
         <a href="<?php echo $userLoggedIn; ?>">
            <img src="<?php echo $user->getProfilePic(); ?>" alt="user picture">
            <span class="userName"><?php echo $user->getFirstName(); ?></span>
         </a>
      </div>
      <div class="homeIcon">
         <a href="index.php">Home</a>
      </div>
      <div class="socialButtons">
         <a href="#">
            <i class="fas fa-user-friends fa-lg"></i>
         </a>
         <a href="#">
            <i class="fab fa-facebook-messenger fa-lg"></i>
         </a>
         <a href="#">
            <i class="far fa-bell fa-lg"></i>
         </a>
         <a href="#">
            <i class="fas fa-cog fa-lg"></i>
         </a>
         <a href="includes/handlers/logout.php">
            <i class="fas fa-sign-out-alt fa-lg"></i>
         </a>                  
      </div>
   </div>
</nav>