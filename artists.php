<?php
include("includes/includedFiles.php");
$moreSongs = "false";
if (isset($_GET['id'])) {
  $artistId = $_GET['id'];
}
else {
  header("Location: index.php");
}

$artist = new Artist($con, $artistId);
 ?>

 <div class="entityInfo">
   <div class="centerSection">
     <div class="artistImage borderBottom">
       <img src="assets/images/artwork/artistimage.jpg" alt="">
     <div class="artistInfo">
       <h1 class="artistName"><?php echo $artist->getName() ?></h1>
       <div class="headerButton">
         <button class="btn" type="button" onclick="playFirstSong()">PLAY!
         </button>
       </div>
       <br>
     </div>
   </div>
   </div>
 </div>


 <div class="trackListContainer borderBottom">
   <h1 class="artistsHeading">Popular</h1>
   <ul class="trackList">
     <?php

       $songIdArray = $artist->getSongIds();
       $i = 1;
       foreach($songIdArray as $songId){
         if($i >5) {
           break;
         }
         $albumSong = new Songs($con, $songId);
         $albumArtist = $albumSong->getArtist();
         echo "<li class='trackListRow'>
               <div class='trackCount'>
                 <img class='playButton' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() .  "\", tempPlaylist, true)'>
                 <span class='trackNumber'>$i</span>
               </div>

               <div class='trackInfo'>
                 <span class='trackName'>" . $albumSong->getTitle() . "</span>
                 <span class='artistName'>" . $albumArtist->getName() . "</span>

               </div>

               <div class='trackOptions'>
                 <img class='optionsButton' src='assets/images/icons/more.png'>
               </div>

               <div class='trackDuration'>
                 <span class='duration'>" . $albumSong->getDuration() . "</span>
               </div>


         </li>";
         $i++;
       }
      ?>
      <script>
        var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
        tempPlaylist = JSON.parse(tempSongIds);

        var tempArtistIds = '<?php echo json_encode($artistId); ?>';
        tempArtist = JSON.parse(tempArtistIds);
        $(".button").attr("onclick", "openPage('artists2.php?id=" + (tempArtist) + "')");


      </script>
   </ul>
   <div class="MoreButton">
     <button class="button">
       <!-- <span class="moreSongs"> -->
         <span role="link" tabindex="0">Show More Songs</span>
       <!-- </span> -->
   </button>
   </div>
 </div>
 <div class="albumHeading">
 <h1 class="artistsHeading">Albums</h1>
 </div>
 <div class="gridViewContainer">
 	<?php
 		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

 		while ($row = mysqli_fetch_array($albumQuery)) {

 			echo "<div class='gridViewItem'>
 						<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
 							<img src='" . $row['artworkPath'] . "'>

 							<div class='gridViewInfo'>"
 								. $row['title'] .
 							"</div>
 							</span>

 			</div>";
 		}
 	 ?>
 </div>
