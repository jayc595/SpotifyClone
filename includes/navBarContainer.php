<div id="NavBarContainer">
<nav class="navBar">
<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
  <img src="assets/images/icons/logo.png">
</span>

  <div class="group">
    <div class="navItem">
      <span role="link" tabindex="0" onclick="openPage('search.php')" class="navItemLink">Search
        <img src="assets/images/icons/search.png" class="searchIcon" alt"Search">
      </span>
    </div>
  </div>

  <div class="group">
    <div class="navItem">
      <span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
    </div>
    <div class="navItem">
      <span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music</span>
    </div>
    <div class="navItem">
      <span role="link" tabindex="0" onclick="openPage('profile.php')" class="navItemLink"><?php echo $userLoggedIn; ?></span>
    </div>
  </div>


</nav>
</div>
