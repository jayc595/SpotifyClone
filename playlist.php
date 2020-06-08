<?php
include("includes/includedFiles.php");
 ?>

 <script>
 document.getElementById("myP").style.display = "none";
 document.getElementById("buttonHide").style.display= "block";
function myFunction() {
  document.getElementById("myP").style.display = "block";
  document.getElementById("buttonHide").style.display= "none";
}
function anotherFunction(){
  var nameOfPlaylist = document.getElementById("playlistName").value;

  if(nameOfPlaylist){
    document.getElementById("myP").style.display = "none";
    $.post("includes/handlers/ajax/createPlaylist.php", { name: nameOfPlaylist, username: userLoggedIn }).done(function(error){
        if(error != ""){
          alert(error);
          return;
        }

        openPage("playlist.php");
    });
    document.getElementById("playlistName").value = "";
  } else {
    alert("Please insert a Playlist name!");
  }



}
</script>

 <div class="playlistsContainer">
   <div class="gridViewContainer">
     <h2 class="artistsHeading">Playlists</h2>
     <div class="buttonItems">
       <div id="buttonHide">
       <button class="btn" onclick="myFunction()">New Playlist</button>
     </div>
       <div id="myP">
       <div class="searchContainer">
         <input type="text" class="searchInput" id="playlistName" value="" placeholder="Playlist name" visibility="hidden">
       </div>
       <button class="btn" onclick="anotherFunction()">Add</button>
     </div>
   </div>

   <?php
     $username = $userLoggedIn->getUsername();

     $playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner='$username'");

     if(mysqli_num_rows($playlistsQuery) == 0) {
       echo "<span class='noResults'>You don't have any playlists yet.</span>";
     }

     while($row = mysqli_fetch_array($playlistsQuery)) {

       $playlist = new Playlist($con, $row);

       echo "<div class='gridViewItem' role='link' tabindex='0'
             onclick='openPage(\"playlists.php?id=" . $playlist->getId() . "\")'>

           <div class='playlistImage'>
             <img src='assets/images/icons/playlist.png'>
           </div>

           <div class='gridViewInfo'>"
             . $playlist->getName() .
           "</div>

         </div>";



     }
   ?>

</div>
      </div>
