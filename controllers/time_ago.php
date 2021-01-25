<?php 
  //date_default_timezone_set("Etc/GMT-8");
  date_default_timezone_set("asia/manila");
  function Time_Convert($time){
    $time_in_seconds = strtotime($time);
    $current_time = time();
    $difference_in_seconds = $current_time - $time_in_seconds;
    $seconds = $difference_in_seconds;
    $minutes = round($seconds/60);
    $hours = round($seconds/3600);
    $days = round($seconds/86400);
    $weeks = round($seconds/604800);
    $months = round($seconds/2629440);
    $years = round($seconds/31553280);
    
    if($seconds <= 60){
      return "Just Now...";
    
    }else if($minutes <= 60){
      if($minutes == 1){
        return "1 min ago...";
      }else{
        return "$minutes mins ago...";
      }
      
    }else if($hours <=24){
      if($hours == 1){
        return "1 hr ago...";
      }else{
        return "$hours hrs ago...";
      }
    }else if($days <= 7){
      if($days == 1){
        return "yesterday...";
      }else{
        return "$days days ago...";
      }
    }else if($weeks <= 4.3){
      if($weeks == 1){
        return "a week...";
      }else{
        return "$weeks weeks ago...";
      }
    }else if($months <= 12){
      if($months == 1){
        return "1 month ago...";
      }else{
        return "$months months ago...";
      }
    }else{
      if($years == 1){
        return "1 yr ago...";
      }else{
        return "$years yrs ago...";
      }
    }
  
  }
?>