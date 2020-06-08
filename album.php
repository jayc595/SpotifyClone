<?php
include ("includes/includedFiles.php");

if (isset($_GET['id'])) {
  $albumId = $_GET['id'];

}
else {
  header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();
$artistId = $artist->getId();

?>
<body onload="hideOptionsMenu()">
<div class="albumInfo">
  <div class="leftSection">
    <img src="<?php echo $album->getArtworkPath(); ?>">
  </div>

  <div class="rightSection">
    <h2><?php echo $album->getTitle(); ?></h2>
    <p role="link" tabindex="0" onclick="openPage('artists.php?id=<?php echo $artistId ?>')">By <?php echo $artist->getName(); ?></p>
    <p>Released: <?php echo $album->getReleaseDate(); ?></p>
    <p><?php echo $album->getNumberofSongs(); ?> songs</p>
  </div>

</div>

<div class="trackListContainer">
  <ul class="trackList">
    <?php
      $songIdArray = $album->getSongIds();

      $i = 1;

      foreach($songIdArray as $songId){
        $albumSong = new Songs($con, $songId);
        $albumArtist = $albumSong->getArtist();
        echo "<li class='trackListRow'>
              <div class='trackCount'>
                <img class='playButton' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() .  "\", tempPlaylist, true)'>
                <span class='trackNumber'>$i</span>
              </div>

              <div class='trackInfo' onclick='setTrack(\"" . $albumSong->getId() .  "\", tempPlaylist, true)'>
                <span class='trackName'>" . $albumSong->getTitle() . "</span>
                <span class='artistName'>" . $albumArtist->getName() . "</span>

              </div>

              <div class='trackOptions'>
                <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
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
     </script>
  </ul>
</div>
<nav class="optionsMenu" role="navigation">
  <ul class="dropdownOptions">
    <li class="item" onclick="openPage('artists.php?id=<?php echo $artistId ?>')"><span role="0" tabindex="0">See Artists</span></li>
    <li class="item">Add to Playlist
        <?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>


    </li>
    <li class="item"><span>BLANK</span></li>
  </ul>
</nav>

</body>
