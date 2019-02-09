<?php 
	session_start();
	if(!isset($_SESSION["user"]))
	{
		$msg = 'You need to log in first !';
		header("location:/View/login.php?notauth=$msg");
	}
	if(time() - $_SESSION['timeout']>1800)
	{
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();
		header("location:/View/login.php"); 
	}
?>
<html>
<head>
	<title>
		Dreamy Music Player
	</title>
	<!-- <link rel="stylesheet" type="text/css" href="../View/font-awesome.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../View/font-awesome.css"> -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="/View/style.css">
	<script type="" src="/Controller/js.js"></script>
	

</head>

<body>
	<div id="both-top">
		<div id="left-holder">
			<div id="left" style="border-bottom:1px solid white;">
				<a href="/Controller/doLogOut.php"><input type="submit" value="Logout" id="submit-btn"></a>
			</div>
			<div id="logout-pos">
				<h1 style="color:white; padding:30px;">Welcome to Dreamy,<br> <?= $_SESSION['user'] ?></h1>
    
				<div class="playlist" style="border-top:2px solid white; width:80%; padding:20px; ">
					<h2 style="color:white; border-bottom:2px solid white;">
						Recently Played
					</h2>
					<div id="slider-holder">
						<div id="slider">
						
						</div>
					</div>
				</div>				
			</div>
		</div>
		<div id="now-playing-bar">
			<div id="now-playing">
			
				<div id="song-pict-bar">
				
				</div>
				<div id="song-name">
					<div id="song-title">...</div>
					<div id="song-artist">...</div>
				</div>
				<button class="like love-btn fa fa-heart fa-2x"></button>
				<button class="ctrl left-btn fa fa-caret-left fa-5x"></button>	
				<button class="ctrl play-btn fa fa-play-circle fa-5x"></button>
				<button class="ctrl right-btn fa fa-caret-right fa-5x"></button>	
				
			</div>
			<div id="song-control">
				<p id="current-duration">00:00</p>
				<div id="bar-progress">
					<div id="bar-fill">
					</div>
				</div>
				<p id="duration">00:00</p>
				<button class="ctrl volume-btn fa fa-volume-up fa-2x not-muted" style="width=200px;"></button>
			</div>
		</div>
		
		<div id="mid">
			<div id="bar">
				<nav id="active" onclick="onClick(this)"><a href="#" id="my-song">MY SONGS</a></nav>
				<nav onclick="onClick(this);"><a class="top-btn" onclick='return false;' href="#search" id="search" >SEARCH</a></nav>
				<nav  onclick="onClick(this);"><a class="top-btn"onclick='return false;'  href="#playlist" id="playlists">PLAYLISTS</a></nav>
				<nav onclick="onClick(this);"><a class="top-btn" onclick='return false;' href="#charts" id="charts">CHARTS</a></nav>
				<nav onclick="onClick(this);"><a class="top-btn" onclick='return false;' href="#favorites" id="favorites" >MY FAVORITES</a></nav>
				<nav onclick="onClick(this);"><a class="top-btn" onclick='return false;' href="#search" id="query-me">QUERY ZONE</a></nav>
				<nav onclick="onClick(this);"><a class="top-btn" onclick='return false;' href="#add-own" id="add-own">ADD YOUR OWN SONG</a></nav>
				
			</div>
			
			<div id="content">
				<div id='wrap-title'>
					<h1 id='title-change'>List of Songs</h1>
				</div>
				<div id="content-holder">
					
				</div>
				
			</div>
		</div>
		
	</div>
	<div id="bottom">

	</div>
	<audio id="audio" src=""></audio>
	<script type="" src="../Controller/loadHome.js"></script>
	<script type="" src="../Controller/MyScript.js"></script>
	<script type="" src="/Controller/interactive.js"></script>


</body>
<script src="../Controller/loadSong.js"></script>
</html>