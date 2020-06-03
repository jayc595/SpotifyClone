<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Songs.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to my Spotify Clone</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="assets/js/script.js"></script>

  </head>
  <body>

		<script>
			var audioElement = new Audio();
			audioElement.setTrack(""); //assets/music/ScottHolmes/InspirationalOutlook.mp3
			audioElement.audio.play();

		</script>
		<div id="mainContainer">
			<div id="topContainer">

				<?php include("includes/navBarContainer.php")  ?>

				<div id="mainViewContainer">
					<div id="mainContent">
