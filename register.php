<?php 
   require 'includes/config.php';
   include 'includes/classes/Account.php';
   include 'includes/classes/Constants.php';
   $account = new Account($con);
   include 'includes/formHandlers/registerHandler.php';
   include 'includes/formHandlers/loginHandler.php';   
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="assets/css/register.css">
   <!-- jQuery CDN -->
   <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous">
   </script>
   <!-- Local JS -->
   <script src="assets/js/register.js"></script>
   <title>Welcome to Rudigram</title>
</head>
<body>
   <?php
      if(isset($_POST['regBtn'])) {
         echo "<script>
                  $(document).ready(function() {
                     $('#loginForm').hide();
                     $('#registerForm').show();
                  });
               </script>";

         if(in_array(Constants::$regSuccessful, $successArray)) {
            //clear all input fields
            $_POST = array();
         }
      }
      else {
         echo "<script>
                  $(document).ready(function() {
                     $('#loginForm').show();
                     $('#registerForm').hide();
                  });
               </script>";
      }     
   ?>

   <?php
      function getInputValue($input) {
         if(isset($_POST[$input])) {
            echo $_POST[$input];
         }
      }
   ?>

   <div id="wrapper">
      <section id="loginBox">
         <div class="loginBoxHeader">
            <h1>RUDIGRAM</h1>
            <p>Login or Sign Up bellow!</p>
         </div>
         <div id="registerForm">
            <form action="register.php" method="POST">
               <?php echo $account->getError(Constants::$firstNameLength); ?>
               <label for="regFirstName">First name</label>
               <input type="text" name="regFirstName" id="regFirstName" value="<?php getInputValue("regFirstName") ?>" required="">

               <?php echo $account->getError(Constants::$lastNameLength); ?>
               <label for="regLastName">Last name</label>
               <input type="text" name="regLastName" id="regLastName" value="<?php getInputValue("regLastName") ?>" required="">

               <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
               <?php echo $account->getError(Constants::$emailInvalid); ?>
               <?php echo $account->getError(Constants::$emailTaken); ?>
               <label for="regEmail1">Email</label>
               <input type="email" name="regEmail1" id="regEmail1" value="<?php getInputValue("regEmail1") ?>" required="">
               <label for="regEmail2">Confirm email</label>
               <input type="email" name="regEmail2" id="regEmail2" value="<?php getInputValue("regEmail2") ?>" required="">

               <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
               <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
               <?php echo $account->getError(Constants::$passwordLength); ?>
               <label for="regPassword1">Password</label>
               <input type="password" name="regPassword1" id="regPassword1" required="">
               <label for="regPassword2">Confirm password</label>
               <input type="password" name="regPassword2" id="regPassword2" required="">
               <input type="submit" class="regBtn" name="regBtn" value="Register">
               
               <?php 
                  $message = Constants::$regSuccessful;
                  if(in_array($message, $successArray)) {
                     echo "<span class='successMessage'>$message</span>";
                  }
                   
               ?>
               <a href="#" id="signin">Already have an account? Sign in here!</a>
            </form>
         </div>
         <div id="loginForm">
            <form action="register.php" method="POST">
               <?php echo $account->getError(Constants::$loginFailed); ?>
               <label for="logEmail">Email</label>
               <input type="email" name="logEmail" id="logEmail" required="">
               <label for="logPassword">Password</label>
               <input type="password" name="logPassword" id="logPassword" required="">
               <input type="submit" class="regBtn" name="logBtn" value="Login">
               <a href="#" id="signup">Don't have an account yet? Click here to register!</a>
            </form>
         </div>  
      </section>
   </div>
</body>
</html>

