<?php
include("includes/config.php");

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

  </head>
  <body>
		<div id="mainContainer">
			<div id="topContainer">
				<div id="NavBarContainer">
					<nav class="navBar">
						<a href="index.php" class="logo">
							<img src="">
						</a>
					</nav>
				</div>
			</div>
			<div id="nowPlayingBarContainer">
					<div id="nowPlayingBar">
							<div id="nowPlayingLeft">
									<div class="content">
										<span class="albumlink">
											<img src="https://blog.spoongraphics.co.uk/wp-content/uploads/2017/01/thumbnail-2.jpg" class="albumArtwork">
										</span>
										<div class="trackInfo">

											<span class="trackName">
												<span>Track Name</span>
											</span>

											<span class="artistName">
												<span>Artist Name</span>
											</span>

										</div>
									</div>
							</div>
							<div id="nowPlayingMiddle">
								<div class="content userControls">
								<div class="buttons">

									<button class="controlButton shuffle" title="Shuffle Button">
										<img src="assets/images/icons/shuffle.png" alt ="Shuffle">
									</button>

									<button class="controlButton previous" title="Previous Button">
										<img src="assets/images/icons/previous.png" alt ="Previous">
									</button>

									<button class="controlButton play" title="Play Button">
										<img src="assets/images/icons/play.png" alt ="Play">
									</button>

									<button class="controlButton pause" title="Pause Button" style="display: none;">
										<img src="assets/images/icons/pause.png" alt ="Pause">
									</button>

									<button class="controlButton next" title="Next Button">
										<img src="assets/images/icons/next.png" alt ="Next">
									</button>

									<button class="controlButton repeat" title="Repeat Button">
										<img src="assets/images/icons/repeat.png" alt ="Repeat">
									</button>

								</div>
									<div class="playbackBar">
										<span class="progressTime current">0.00</span>
										<div class ="progressBar">
											<div class="progressBarBG">
												<div class="progress"></div>
											</div>
										</div>
										<span class="progressTime remaining">0.00</span>
									</div>

							</div>
						</div>
							<div id="nowPlayingRight">
								<div class="volumeBar">
									<button class="controlButton volume" title="Volume Button">
										<img src="assets/images/icons/volume.png" alt="Volume">
									</button>

									<div class ="progressBar">
										<div class="progressBarBG">
											<div class="progress"></div>
										</div>
									</div>

								</div>
							</div>

					</div>




      </div>
		</div>






  </body>
</html>
