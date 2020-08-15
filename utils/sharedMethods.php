<?php
 function checkInput($str){
     $str = htmlspecialchars($str);
     $str = trim($str);
     $str = stripslashes($str);
     return $str;
 }
 function isCurrentUrl($url){
     $currentUrl = $_SERVER['REQUEST_URI'];
     if($url === $currentUrl) return true;
     else return false;
 }
?>