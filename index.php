<?php
// Start the session
session_start();
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['success']);
unset($_SESSION['type']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>




	<!-- Latest compiled and minified CSS -->

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->



	<script src="https://use.fontawesome.com/7b9d31eb31.js"></script>

	<!-- jQuery library -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

	<!-- Popper JS -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->

	<!-- Latest compiled JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
 	<link rel="stylesheet" type="text/css" href="styles.css">


	<style media="screen">
	h1 {
		color: red;
	}
	body {
		background-image: url(https://cdn.wallpapersafari.com/49/34/ftBCER.jpg);
	}
	#Navbar{
		float: left;
		width: 38%;
		padding-top: 1.5%;
		padding-left: 7%
	}
	#Navbar a{
		color: black;
		text-decoration: none;
		padding: 4%;
	}
	#user {
		float: right;
		width: 15%;
		padding-top: 1.5%;
		display: inline-block;
	}
	#user a{
		color: black;
		text-decoration: none;

	}
	.container1 {
		float: left;
		padding: 17% 11% 0 7%;
	}
	/* .container1 a {
		padding: 7% 0;
		color: white;
		font-size: 1.8rem;
		text-decoration: none;
	} */
	.container2 {
		float: right;
		padding: 17% 7% 0 9%;
	}
	/* .container2 a {
		padding: 7% 0;
		color: white;
		font-size: 1.6rem;
		text-decoration: none;
	} */
	.button1 {
  background-color: #008CBA;
	display: inline-block;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;

}
.button4 {
background-color: white;
color: black;
border: none;
padding: 20px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
border-radius: 12px;
margin-bottom: 10%;
}
	</style>

</head>
<body class="border border-danger">
	<!-- <img src="https://wallpapercave.com/wp/wp4323461.png" alt="" style="overflow: hidden;"> -->
	<nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background-color: #fff">
        <div class="container">
            <!-- <button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <a class="navbar-brand" href="#"><img src="https://image1.jdomni.in/storeLogo/06122019/5A/DC/BC/9E00E7F722EECF9BE0DCA823FE_1575632302331.png?output-format=webp" style="max-width:195px;max-height:66px" alt="" title=""></a>

						<!-- <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-items active"><a class="nav-link" href="#"><span class="fa fa-home"></span> Home</a></li>
                    <li class="nav-items"><a class="nav-link" href="aboutus.html"><span class="fa fa-info"></span> About</a></li>
                    <li class="nav-items"><a class="nav-link" href="contactus.html"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
								</ul>
            </div> -->
						<div class="collapse navbar-collapse" id="Navbar">

                    <a class="nav-link" href="#"><span class="fa fa-home"></span> Home</a>
                    <a class="nav-link" href="#"><span class="fa fa-info"></span> About</a>
                    <a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> Contact</a>

            </div>
            <!-- <div class="collapse navbar-collapse" id="user">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-items active"><a class="nav-link" href="#"><span class="fa fa-home"></span><? echo "hello ".$?></a></li>
                    <li class="nav-items"><a class="nav-link" href="loginR.php"><span class="fa fa-info"></span>Request Blood </a></li>
                    <li class="nav-items"><a class="nav-link" href="contactus.html"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
									</ul>
						</div> -->
						<div class="collapse navbar-collapse" id="user">

                    <!-- <a class="nav-link" href="#"><span class="fa fa-home"></span><? echo "hello ".$?></a> -->
                    <a class="nav-link" href="loginR.php" style="margin-left: 13%;"><span class="fa fa-info"></span> Request Blood </a>
                    <!-- <a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> Hospitals Around</a> -->

						</div>
        </div>
    </nav>


		<!-- <div class="container-pg" > -->
				<!-- <img src="https://wallpapercave.com/wp/wp4323461.png" alt="" style="height: 700px;"> -->

		<!-- </div> -->
	<!-- <div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form class="border">
					<div class=" form-group row ">
						<label><h3><a href="receiverRegister.php">Register as a Receiver</a></h3></label>
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<form class="border">
					<div class=" form-group row ">
						<label><a href="hospitalRegister.php"><h3>Register as a Hospital</h3></a></label>
					</div>
				</form>
			</div>
		</div>
		<div class="row"><label><h4>Already has an account</h4></label></div>
		<div class="row">
			<div class="col-sm-6">
				<form class="border">
					<div class=" form-group row ">
						<label><h3><a href="loginR.php">Login as a Receiver</a></h3></label>
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<form class="border">
					<div class=" form-group row ">
						<label><a href="loginH.php"><h3>Login as a Hospital</h3></a></label>
					</div>
				</form>
			</div>
		</div>
	</div> -->
	<div class="col-sm-2" style="margin: 10% 45%;;">
		<button class="button button1" onclick="location.href = 'available.php';">Available Blood</button>
	</div>
	<div class="container" style="margin: 0 15%;">
		<div class="row">
			<div class="col-sm-5" style="float: left;display: inline-block;">
				<button class="button button4" onclick="location.href = 'receiverRegister.php';">Register as Receiver</button>
				<br>
				<button class="button button4" onclick="location.href = 'loginR.php';">Login as a Receiver</button>
			</div>
			<!-- <div class="col-sm-2" style="vertical-align: middle;display: inline-block;">
				<button class="button button1" onclick="location.href = 'available.php';">Available Blood</button>
			</div> -->
			<div class="col-sm-5" style="float: right;display: inline-block;">
				<button class="button button4" onclick="location.href = 'hospitalRegister.php';">Register as Hospital</button>
				<br>
				<button class="button button4" onclick="location.href = 'loginH.php';">Login as a Hospital</button>

			</div>
		</div>

			<!-- <label><h3><a href="receiverRegister.php">Register as a Receiver</a></h3></label> -->
			<!-- <button class="button button4" onclick="location.href = 'receiverRegister.php';">Register as a Receiver</button> -->


			<!-- <label><h3><a href="loginR.php">Login as a Receiver</a></h3></label> -->
			<!-- <button class="button button4" onclick="location.href = 'loginR.php';">Login as a Receiver</button> -->


	<!-- <button class="button button1" onclick="location.href = 'available.php';">Available Blood</button> -->

			<!-- <label><a href="hospitalRegister.php"><h3>Register as a Hospital</h3></a></label> -->
			<!-- <button class="button button4" onclick="location.href = 'hospitalRegister.php';">Register as a Hospital</button> -->
		<!-- </div>
		<div class="l2"> -->
			<!-- <label><a href="loginH.php"><h3>Login as a Hospital</h3></a></label> -->
			<!-- <button class="button button4" onclick="location.href = 'loginH.php';">Login as a Hospital</button> -->
		<!-- </div>
	</div> -->
</body>
</html>
