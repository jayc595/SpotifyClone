<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) { //tests whether it came from an AJAX call or not
  include("includes/config.php");
  include("includes/classes/User.php");
  include("includes/classes/Artist.php");
  include("includes/classes/Album.php");
  include("includes/classes/Songs.php");
  include("includes/classes/Playlist.php");

  if(isset($_GET['userLoggedIn'])) {
    $userLoggedIn = new User($con, $_GET['userLoggedIn']);
  }
  else {
    echo "username variable was not passed";
  }
}
 else {
   include("includes/header.php");
   include("includes/footer.php");

   $url = $_SERVER['REQUEST_URI'];
   echo "<script>openPage('$url')</script>";
   exit();
 }
 ?>
