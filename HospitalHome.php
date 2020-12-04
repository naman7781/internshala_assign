<!--//Available blood bank table page - Available to all
//Request Sample - 1. Not login - Take to the login page of users
				   2. Login as a user  - Take to the request sample page
				   3. Login as a hospital - Hide the Request sampple button
//For hospitals at the place of Request Sample button, View request page button will be there.
// Add blood info page only for hospitals.*/-->

<?php

session_start();

if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}

if (!isset($_SESSION['name']) && $_SESSION['type'] != 1){
	header("Location: loginR.php");
	return;
}

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bloodbank', 'Peoples', 'bank');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$failure = false;

if ( isset($_POST['add']) && is_numeric($_POST['num'])){

    $stmt = $pdo->prepare('INSERT INTO available
        (blood_grp,unit,contact_no,email,hospital_name) VALUES ( :bg, :nm, :cn, :em, :ps)');
    $stmt->execute(array(
        ':bg' => htmlentities($_POST['blood_grp']),
        ':nm' => htmlentities($_POST['ut']),
        ':cn' => htmlentities($_POST['num']),
        ':em' => htmlentities($_SESSION['email']),
        ':ps' => htmlentities($_SESSION['name']))
        );
    header("Location: HospitalHome.php");
    return;
    $failure=true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Hospital Home</title>
  <script src="https://use.fontawesome.com/7b9d31eb31.js"></script>
  <?php require_once "bootstrap.php"; ?>

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
      padding: 4% 2%;
      font-size: 1.2rem;
    }

    .container1 {
      float: left;
      padding: 17% 7%;
    }
    .container1 a {
      padding: 7% 0;
      color: white;
      font-size: 1.8rem;
      text-decoration: none;
    }
    .container2 {
      float: right;
      padding: 15% 7%;
    }
    .container2 a {
      padding: 7% 0;
      color: white;
      font-size: 1.6rem;
      text-decoration: none;
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
    .col-sm-10 {
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
	<nav class="navbar navbar-dark navbar-expand-sm fixed-top"  style="background-color: #fff">
        <div class="container">
            <!-- <button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <a class="navbar-brand" href="#"><img src="https://image1.jdomni.in/storeLogo/06122019/5A/DC/BC/9E00E7F722EECF9BE0DCA823FE_1575632302331.png?output-format=webp" style="max-width:195px;max-height:66px" alt="" title=""></a>


            <div class="collapse navbar-collapse" id="Navbar" style="padding: 0;">

                    <a class="nav-link" href="#"><span class="fa fa-home"></span> Home</a>
                    <a class="nav-link" href="#"><span class="fa fa-info"></span> About</a>
                    <a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> Contact</a>

            <!-- </div>
            <div class="collapse navbar-collapse" id="user"> -->

                    <!-- <a class="nav-link" href="#"><span class="fa fa-home"></span><? echo "hello ".$_SESSION['name'] ?></a></li> -->
                    <a class="nav-link" href="available.php"><span class="fa fa-address-card fa-lg"></span> Available Blood</a>
                    <button onclick="location.href = 'index.php';" style="margin: 0 1%;">Logout</button>
                    <button onclick="location.href = 'viewReq.php';" style="margin: 0 1%;">View Request</button>

			</div>
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

	<div class="container" style="margin-top: 20%;">
		<form class="border" method="post" style="border: 4px solid white !important">
			<div class="form-group row">
				<label for="grp"><b>Blood Group</b></label>
				 <select class="custom-select" name="blood_grp" required style="width: 22.2%;margin-left: 6.4%;">
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
						<label for="ut" style="margin-left: 9%;"><b>Units Req.</b></label>
				</div>
				<div class="col-sm-3">
					<input type="number" name="ut" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<label for="nm" style="margin-left: 9%;"><b>Name</b></label>
				</div>
				<div class="col-sm-3">
					<input type="text" name="nm" class="form-control" value="<?php echo($_SESSION['name']); ?>" disabled>
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
					<label for="mail" style="margin-left: 9%;"> <b>Email</b></label>
				</div>
				<div class="col-sm-3">
					<input type="email" name="mail" class="form-control" value="<?php echo($_SESSION['email']); ?>" disabled>
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
				<button type="submit" class="btn btn-danger" name="add" style="margin: 0 2.9%;">Add Blood</button>
				<button type="reset" class="btn btn-danger">Reset</button>

			</div>
		</form>
	</div>
</body>
</html>
