<?php
include_once("konfigurasi.php");

    $psn = "";
	if(isset($_POST["txUSER"])){
		$user = $_POST["txUSER"];
		$pwd = $_POST["txPASS"];

		//echo "DEBUG : Username :".$user;
		//echo "Password :".$pwd;

		$sql = "SELECT tu.nama, tu.email, tu.username, tu.passkey, tu.iduser FROM tbuser tu WHERE tu.username='".$user."';";
        $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Gagal terkoneksi ke dbmahasiswa");
        $hasil = mysqli_query($cnn, $sql);
        $jdata = mysqli_num_rows($hasil);
        
        //echo "DEBUG: jdata=>".$jdata;
        $h = mysqli_fetch_assoc($hasil);

        //echo"DEBUG: <br> Nama : ".$h["nama"];
        if(md5($pwd) == $h["passkey"]){
            //echo "DEBUG: password sama";
        }else{
            $psn = "LOGIN GAGAL!!!!!!";
        }
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="loginpage.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>

	<div><?=$psn;?></div>

	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="login">
				<form method="POST" action="loginpage.php">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="txUSER" placeholder="Username">
					<input type="password" name="txPASS" placeholder="Password">
					<button>Login</button>
				</form>
			</div>

			<div class="signup">
				<div class="wave">
					<form method="POST" action="loginpage.php">
						<label for="chk" aria-hidden="true">Sign up</label>
						<input type="text" name="txUSER" placeholder="User name" required="">
						<input type="email" name="txEMAIL" placeholder="Email" required="">
						<input type="password" name="txPASS" placeholder="Password" required="">
						<button>Sign up</button>
					</form>
				</div>
			</div>

	</div>
</body>
</html>