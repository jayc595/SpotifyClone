<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) { //tests whether it came from an AJAX call or not
  include("includes/config.php");
  include("includes/classes/Artist.php");
  include("includes/classes/Album.php");
  include("includes/classes/Songs.php");
}
 else {
   include("includes/header.php");
   include("includes/footer.php");

   $url = $_SERVER['REQUEST_URI'];
   echo "<script>openPage('$url')</script>";
   exit();
 }
 ?>
