<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bloodbank', 'Peoples', 'bank');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$failure = false;

if ( isset($_POST['add']) && is_numeric($_POST['num'])){

	$md5 = hash('md5', htmlentities($_POST['pwd']));
    $stmt = $pdo->prepare('INSERT INTO receiver
        (blood_grp,name,contact_no,email,password) VALUES ( :bg, :nm, :cn, :em, :ps)');
    $stmt->execute(array(
        ':bg' => htmlentities($_POST['blood_grp']),
        ':nm' => htmlentities($_POST['nm']),
        ':cn' => htmlentities($_POST['num']),
        ':em' => htmlentities($_POST['mail']),
        ':ps' => ($md5))
        );
    header("Location: loginR.php");
    return;
    $failure=true;
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<script src="https://use.fontawesome.com/7b9d31eb31.js"></script>
	<?php require_once "bootstrap.php"; ?>
	<style media="screen">
	body {
		background-image: url(https://cdn.wallpapersafari.com/49/34/ftBCER.jpg);
	}
	img {
		display: inline-block;
		padding: 2% 2% 0 2%;
	}
	#Navbar{
		display: inline-block;
		width: 38%;
		padding-bottom: 2%;
		vertical-align: middle;
		margin-top: 1%;
	}
	#Navbar a{
		color: black;
		text-decoration: none;
		vertical-align: middle;
		font-size: 1.6rem;
		margin: 0 3%;
	}
	label {
		padding-left: 3%;
	}
	select {
		width: 60%;
	}
	b {
		color: white;
	}
	.agp {
		color: white;
	}
	.form-group{
		margin-top: 3%;
	}
	.form-control {
		border: 2px solid white !important
	}
	</style>
</head>
<body class="border border-danger">
	<!-- <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#"><img src="logo.png" height="30" width="41"></a>
            <div class="collapse navbar-collapse" name="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-items"><a class="nav-link" href="index.php"><span class="fa fa-home"></span> Home</a></li>
                    <li class="nav-items"><a class="nav-link" href="aboutus.html"><span class="fa fa-info"></span> About</a></li>
                    <li class="nav-items"><a class="nav-link" href="contactus.html"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
				</ul>
            </div>
        </div>
    </nav> -->
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
							<div class="collapse navbar-collapse" id="Navbar" style="padding: 0;">

	                    <a class="nav-link" href="index.php"><span class="fa fa-home"></span> Home</a>
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

	        </div>
	    </nav>

    <!-- <header class="jumbotron jumbotron-fluid">
		<div class="container">
			<div class="row row-header">
				<div class="col-sm-3">
					<img src="logo.png" class="img-fluid pt-5">
				</div>
				<div class="col-sm-9 align-middle">
					<h1>People's Blood Bank</h1>
				</div>
			</div>
		</div>
	</header> -->
	<?php
	if(isset($_POST['add']) && (!is_numeric($_POST['no']))){
		echo "<font color='red'> Invalid Contact number</font>";
	}
	?>
	<div class="container" style="margin-top: 20%;">
		<form class="border" method="post" style="border: 4px solid white !important">
			<div class="form-group row">
				<label for="grp"><b>Blood Group -</b></label>
				 <select class="custom-select" name="blood_grp" required style="width: 22.2%;margin-left: 5.6%;">
				    <option value="">Select Blood Group</option>
				    <option value="A+">A+</option>
				    <option value="B+">B+</option>
				    <option value="O+">O+</option>
				    <option value="A-">A-</option>
				    <option value="B-">B-</option>
				    <option value="O-">O-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				  </select>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<label for="nm" style="margin-left: 9%;"><b>Name</b></label>
				</div>
				<div class="col-sm-3">
					<input type="text" name="nm" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<label for="no" style="margin-left: 9%;"><b>Contact No.</b></label>
				</div>
				<div class="col-sm-3">
					<input type="tel" name="num" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<label for="mail" style="margin-left: 9%;"><b>Email Id</b></label>
				</div>
				<div class="col-sm-3">
					<input type="email" name="mail" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<label for="pwd" style="margin-left: 9%;"><b>Password</b></label>
				</div>
				<div class="col-sm-3">
					<input type="password" name="pwd" id="pwd" class="form-control" required>
				</div>
				<div class="col-sm-4">
					<label class="agp">(Recommended: password length between 8-20 and contain one digit and one alphabet.)</label>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<label for="cpwd" style="margin-left: 9%;"><b>Confirm Password</b></label>
				</div>
				<div class="col-sm-3">
					<input type="text" name="cpwd" id="cpwd" class="form-control" required>
				</div>
				<div class="col-sm-4">
					<label class="agp">(Confirm password must be same as above password.)</label>
				</div>
				<div class="row" id="conf" style="color: yellow;">
				</div>
			</div>
			<div class="form-group row" style="margin-left: 1.4%;">
				<div class="col-sm-1">
					<input type="checkbox" name="tnc" required>
				</div>
				<div class="col-sm-5">
					<label for="tnc" class="agp">Accept all the terms and conditions</label>
				</div>
			</div>
			<div class="form-group row">
				<button type="submit" class="btn btn-danger" name="add" style="margin: 0 2.9%;">Register</button>
				<button type="reset" class="btn btn-danger">Reset</button>

			</div>

		</form>
	</div>
</body>
</html>
<script type="text/javascript">
	/*$(document).ready(function(){
		$('input[type=password]').keyup(function(){
			var pswd = $(this).val();
			if ( pswd.length < 8 || !pswd.match(/[A-z]/) || !pswd.match(/\d/) ) {
				$('#psswd').show();
			}
			else{
				$('#psswd').hide();
			}
		})
		$('#cpwd').keyup(function(){
			var pswd = $('#pwd').val();
			var pswd1 = $('#cpwd').val();
			if ( pswd!=pswd1 ) {
				$('#conf').show();
			}
			else{
				$('#conf').hide();
			}
		})
	});*/
	function match(){
		var pswd = $('#pwd').val();
		var pswd1 = $('#cpwd').val();
		if ( pswd!=pswd1 ) {
			$('#conf').html("Passwords does not match!");;
		}
		else{
			$('#conf').html("Passwords match.");
		}
	}
	$(document).ready(function () {
       $("#cpwd").keyup(match);
    });

</script>
