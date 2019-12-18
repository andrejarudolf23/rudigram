<?php

function likeCountString($input) {
   if($input == 0) {
      $input = "<div class='likeCountContainer' style='visibility: hidden;'>
                  <span class='postLikeCount'>
                     <i class='fas fa-thumbs-up fa-xs'></i> 
                  </span>
                  <span class='likeNum'>0</span>
               </div>";
      return $input;
   }

   $input = "<div class='likeCountContainer'>
               <span class='postLikeCount'>
                  <i class='fas fa-thumbs-up fa-xs'></i> 
               </span>
               <span class='likeNum'>$input</span>
            </div>";

   return $input;
}

function commentCountString($input) {
   if($input == 0) {
      return '';
   }
   if($input == 1) {
      return "1 Comment";
   }

   $input .= " Comments";
   return $input;
}

function calculateTimeframe($postDateTime) {
   //Timeframe
   $timeMessage = "";
   $dateTimeNow = date("Y-m-d H:i:s");
   $startDate = new DateTime($postDateTime); //Time of post
   $endDate = new DateTime($dateTimeNow); //Current time
   $interval = $startDate->diff($endDate); //Difference between dates

   if($interval->y >= 1) {
      if($interval->y == 1) {
         $timeMessage .= $interval->y . " year ago"; // 1 Year ago
         return $timeMessage;
      }

      $timeMessage .= $interval->y . " years ago"; // 1+years ago
      return $timeMessage;
   }
   if($interval->m >= 1) {
      if($interval->m == 1) {
         $timeMessage .= $interval->m . " month ago";
         return $timeMessage;
      }

      $timeMessage .= $interval->m . " months ago";
      return $timeMessage;
   } 
   if($interval->d >= 1) {
      if($interval->d == 1) {
         $timeMessage .= $interval->d . " day ago";
         return $timeMessage;
      }

      $timeMessage .= $interval->d . " days ago";
      return $timeMessage;
   }
   if($interval->h >= 1) {
      if($interval->h == 1) {
         $timeMessage .= $interval->h . " hour ago";
         return $timeMessage;
      }

      $timeMessage .= $interval->h . " hours ago";
      return $timeMessage;
   }
   if($interval->i >= 1) {
      if($interval->i == 1) {
         $timeMessage .= $interval->i . " minute ago";
         return $timeMessage;
      }

      $timeMessage .= $interval->i . " minutes ago";
      return $timeMessage;
   }
   if($interval->s < 60) {
      $timeMessage .= "Just now";
   }   

   return $timeMessage;
}

function calculateCommentTimeframe($postDateTime) {
   //Timeframe
   $timeMessage = "";
   $dateTimeNow = date("Y-m-d H:i:s");
   $startDate = new DateTime($postDateTime); //Time of post
   $endDate = new DateTime($dateTimeNow); //Current time
   $interval = $startDate->diff($endDate); //Difference between dates

   if($interval->y >= 1) {
      $timeMessage .= $interval->y . "y"; 
      return $timeMessage;
   }
   if($interval->m >= 1) {
      $timeMessage .= $interval->m . "m";
      return $timeMessage;
   }
   if($interval->d >= 1) {
      $timeMessage .= $interval->d . "d";
      return $timeMessage;
   }
   if($interval->h >= 1) {
      $timeMessage .= $interval->h . "h";
      return $timeMessage;
   }
   if($interval->i >= 1) {
      $timeMessage .= $interval->i . "min";
      return $timeMessage;
   }
   if($interval->s < 60) {
      if($interval->s < 30) {
         $timeMessage .= "Just now";
         return $timeMessage;
      }
      $timeMessage .= $interval->s . "s";
   }

   return $timeMessage;
}


?>