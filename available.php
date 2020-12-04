<?php

session_start();

if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}


if(isset($_SESSION['type'])){
    if($_SESSION['type']==0)
    {
        echo "<script type='text/javascript'>";
        echo "function link(){";
            echo "document.getElementById('hmm').href = 'ReceiverHome.php';}";
        echo "</script> ";
    }
    if($_SESSION['type']==1)
    {
        echo "<script type='text/javascript'>";
        echo "function link(){";
            echo "document.getElementById('hmm').href = 'HospitalHome.php';}";
        echo "</script> ";
    }
}
else{

    echo "<script type='text/javascript'>";
    echo "function link(){";
        echo "document.getElementById('hmm').href = 'index.php';}";
    echo "</script>";
}

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bloodbank', 'Peoples', 'bank');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$failure = false;

$stmt = $pdo->query("SELECT user_id, blood_grp, unit, contact_no, email, hospital_name FROM available");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Blood</title>
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
    tr {
      color: white;
      padding: 1% 1%;
      width: 6%;
    border-right-width: 3px;
    }
    th {
      color: white;
      padding: 1% 1%;
      width: 6%;
    border-right-width: 3px;
    }
    td {
      color: white;
      padding: 1% 1%;
      width: 6%;
    border-right-width: 3px;
    }
  	</style>
</head>
<body class="border border-danger">
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background-color: #fff">
        <div class="container">
            <!-- <button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <a class="navbar-brand" href="#"><img src="https://image1.jdomni.in/storeLogo/06122019/5A/DC/BC/9E00E7F722EECF9BE0DCA823FE_1575632302331.png?output-format=webp" style="max-width:195px;max-height:66px" alt="" title=""></a>


            <div class="collapse navbar-collapse" id="Navbar" style="padding: 0;">

                    <a class="nav-link" href="HospitalHome.php" onclick="link();" id="hmm"><span class="fa fa-home"></span> Home</a>
                    <a class="nav-link" href="#"><span class="fa fa-info"></span> About</a>
                    <a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> Contact</a>

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
    <div class="container" style="margin-top: 10%;">
        <h2 style="color: white;">Available Blood</h2>
        <table border="" style="border: 4px solid white !important">
            <tr><th>Available-No.</th><th>Blood Group</th><th>Units Required</th><th>Contact No.</th><th>Email</th><th>Hospital Name</th></tr>
            <?php
            foreach ( $rows as $row ) {
                echo "<tr>";
                echo "<td>";
                echo($row['user_id']);
                echo("</td>");
                echo "<td>";
                echo($row['blood_grp']);
                echo("</td>");
                echo "<td>";
                echo($row['unit']);
                echo("</td>");
                echo "<td>";
                echo($row['contact_no']);
                echo("</td>");
                echo "<td>";
                echo($row['email']);
                echo("</td>");
                echo "<td>";
                echo($row['hospital_name']);
                echo("</td>");
                echo "</tr>";
            }
            ?>
    </ul>
        </table>
    </div>
</body>
</html>
