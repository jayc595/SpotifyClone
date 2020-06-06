<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
  $term = urldecode($_GET['term']);

}
else {
  $term = "";
}
 ?>

 <div class="searchContainer">
   <h4>Search for Artists, Albums, Songs or Playlists</h4>
   <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Search..."
onfocus="var val=this.value; this.value=''; this.value= val;">
 </div>

 <script>
 $(".searchInput").focus();
   $(function() {
     var timer;
     $(".searchInput").keyup(function(){
       clearTimeout(timer);

       timer = setTimeout(function(){
         var val = $(".searchInput").val();
         openPage("search.php?term=" + val);
       }, 200)

     })
   })
   <?php if($term == "") exit(); ?>
 </script>

     <?php
       $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");
       $songIdArray = array();
       $i = 1;

       if(mysqli_num_rows($songsQuery) >= 1) {
         echo "<div class='trackListContainer borderBottom'>
         <h1 class='artistsHeading'>Songs</h1>
         <ul class='trackList'></ul>
         </div>";
       }

       while($row = mysqli_fetch_array($songsQuery)){
         if($i >15) {
           break;
         }

        array_push($songIdArray, $row['id']);

         $albumSong = new Songs($con, $row['id']);
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
      </script>

   <?php
    $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");

    if(mysqli_num_rows($artistsQuery) >= 1) {
      echo "<div class='artistsContainer borderBottom'><h1 class='artistsHeading'>Artists</h1></div>";
    }


    while($row = mysqli_fetch_array($artistsQuery)) {
      $artistFound = new Artist($con, $row['id']);


      echo "<div class='searchResult'>
            <div class='artistName'>
              <span role='link' tabindex='0' onclick='openPage(\"artists.php?id=". $artistFound->getId() ."\")'>" . $artistFound->getName() . "</span>

            </div>

      </div>";
    }

    ?>

    <div class="gridViewContainer">

    	<?php
    		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");

        if(((mysqli_num_rows($artistsQuery) == 0) && mysqli_num_rows($songsQuery) == 0) && mysqli_num_rows($albumQuery) == 0) {
          echo "<div class='noResultsdiv'><span class='noResults'>No results found matching your query: " . $term . "</span></div>";
        }

        if(mysqli_num_rows($albumQuery) >= 1) {
          echo "<div class='albumHeading'>
          <h1 class='artistsHeading borderBottom'>Albums</h1>
          </div>
          ";

        }

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
