<?php
function is_logged_in() {
    $CI =& get_instance();
  if (!isset($CI->session->userdata['logged_in'])){ 
  
   return false; 
  } 
 else { 
 
   return true;
 }

} ?>
