<?php

function likeCountString($input) {
   if($input == 0) {
      $input = "<div class='likeCountContainer'></div>";
      return $input;
   }

   
   $input = "<div class='likeCountContainer'>
               <span class='postLikeCount'>
                  <i class='fas fa-thumbs-up fa-xs'></i> 
               </span>
               <span>$input</span>
            </div>";

   return $input;
}

function commentCountString($input) {
   if($input == 0) {
      $input = '';
   }
   else {
      if($input == 1) {
         $input .= " Comment";
      }
      $input .= " Comments";
   }

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

      if($interval->y == 1)
         $timeMessage .= $interval->y . " year ago"; // 1 Year ago
      else
         $timeMessage .= $interval->y . " years ago"; // 1+year ago

   } 
   else if($interval->m >= 1) {

      if($interval->d == 0) {
         $days = " ago";
      }
      else if($interval->d == 1) {
         $days = $interval->d . " day ago";
      }
      else {
         $days = $interval->d . " days ago";
      }

      if($interval->m == 1) {
         $timeMessage .= $interval->m . " month" . $days;
      }
      else {
         $timeMessage .= $interval->m . " months" . $days;
      }

   }
   else if($interval->d >= 1) {

      if($interval->d == 1) {
         $timeMessage .= "Yesterday";
      }
      else {
         $timeMessage .= $interval->d . " days ago";
      }
   }
   else if($interval->h >= 1) {

      if($interval->h == 1) {
         $timeMessage .= $interval->h . " hour ago";
      }
      else {
         $timeMessage .= $interval->h . " hours ago";
      }
   }
   else if($interval->i >= 1) {

      if($interval->i == 1) {
         $timeMessage .= $interval->i . " minute ago";
      }
      else {
         $timeMessage .= $interval->i . " minutes ago";
      }
   }
   else {

      if($interval->s < 30) {
         $timeMessage .= "Just now";
      }
      else {
         $interval->s . " seconds ago";
      }
   }

   return $timeMessage;
}


?>