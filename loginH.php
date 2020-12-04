<?php // Do not put any HTML above this line

session_start();
if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to home page
    header("Location: index.php");
    return;
}



$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bloodbank', 'Peoples', 'bank');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$failure = false;

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['who']) && isset($_POST['pass'])) {

	$md5 = hash('md5', htmlentities($_POST['pass']));

    $stmt = $pdo->prepare('SELECT hospital_name, email FROM hospital
    WHERE email = :em AND password = :pw');
    $stmt->execute(array( ':em' => $_POST['who'], ':pw' => $md5));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ( $row !== false ) {
        $_SESSION['name'] = $row['hospital_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['success'] = "Login Successful";
        $_SESSION['type'] = 1;
        // Redirect the browser to index.php
        header("Location: HospitalHome.php");
        return;
    } else {
        $_SESSION['error'] = "Incorrect Username or Password";
        header("Location: loginH.php");
        return;
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
  .row {
    margin: 5%;
    width: 90%;
    color: white;
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
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-items"><a class="nav-link" href="index.php"><span class="fa fa-home"></span> Home</a></li>
                    <li class="nav-items"><a class="nav-link" href="aboutus.php"><span class="fa fa-info"></span> About</a></li>
                    <li class="nav-items"><a class="nav-link" href="contactus.php"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
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
	if (isset($_POST['login'])) {
	    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
	            echo "<font color='red'>User name and password are required</font>";
	    }
	    elseif (!strstr( $_POST['who'], '@' )) {
	        echo "<font color='red'>Email must have an at-sign (@)</font>";
	    }
	    elseif ($failure) {
	        echo "<font color='red'>Incorrect password</font>";
	    }
	}
	?>

	<div class="container"  style="margin-top: 15%;">
		<div class="row">
			<label><h3><b>Hospital Login</h3></b></label>
		</div>
		<form class="border" method="post" style="border: 4px solid white !important;width: 60%;">
			<div class="row">
				<div class="col-sm-3">
					<label for="nam">User Name</label>
				</div>
				<div class="col-sm-8">
					<input type="text" name="who" id="nam"><br/>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<label for="id_1723">Password</label>
				</div>
				<div class="col-sm-8">
					<input type="password" name="pass" id="id_1723"><br/>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					<input type="submit" value="Log In" name="login">
				</div>
				<div class="col-sm-2">
					<input type="submit" name="cancel" value="Cancel">
				</div>
			</div>
		</form>
	</div>
</body>
</html>
