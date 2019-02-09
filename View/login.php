<?php 
	session_start();
	if(isset($_SESSION["user"]))
	{
		header('location:/View/home.php');
		terminate();
	}
	
	
?>
<html>
<head>
	<title>
		Dreamy Music Player		
	</title>
	<link rel="stylesheet" type="text/css" href="/View/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="/Controller/js.js"></script>
	<script src="/Controller/hoverPreview.js"></script>

	<script src="/Controller/MyScript.js?"></script>
</head>
<body>

	<div id="mid">
		<div id="login-form">
			<div id="left-form">
				<h1 style="margin-bottom:20px; opacity:0.5;">Login</h1>
				
				<form action="/Controller/doLogin.php" method="POST">
					Username <input type="text" name="uname" id="uname" value="<?=@$_GET['user'] ?>" autocomplete="off">
					Password <input type="password" name="passw" value="<?=@$_GET['passw'] ?>">
					<p style="color:white"><?= @$_GET['error']?></p>
					<input type="submit" value="Login" id="submit-btn">
					<br>

					<div>
						<div>
							<a href="#">Forgot your username or password?</a>
						</div>
						<div style="margin-top:20px;">
							Don't have an account?<a href="#" onclick="">Sign Up</a>

						</div>
					</div>
					
				</form>
				
			</div>
			
			<div id="right">
				<h1 style="font-size:50px; opacity:0.3;">
					Enjoy Your Music Where Ever You're
				</h1>
				<div id="holder">	
					<?php
						require('../Controller/fetchAlbum.php');
						while($statement->fetch()){
					?>
					<div id="text-content">
						<div class="inner-card">
							<div class="card" style="background-image: url('<?=$row_path?>');">
							</div>
							<div class="card-back">
								<h1 id="<?=$row_name?>"><?=$row_name?></h1>
								<h2><?=$row_artist?></h2>
								<h3><?=$row_prod?></h3>
							</div>
						</div>
					</div>
					<?php 
						}
					
					?>
					
				</div>
				
							
				
			</div>
			
		</div>

		
	</div>
	
	
	<audio id="audio" src=""></audio>

</body>

</html>
<?php
if(@$_GET['notauth']!=""){
	$msg = $_GET['notauth'];
	echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>