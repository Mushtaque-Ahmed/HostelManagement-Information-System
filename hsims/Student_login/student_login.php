<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['s_username'])) {
    header("Location: student_profile.php");
}
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM student WHERE s_email='$email' AND s_password='$password'";
	$result = mysqli_query($conn, $sql);
	 if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['s_id'] = $row['s_id'];
		$_SESSION['s_username'] = $row['s_username'];
		
		header("Location: student_profile.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="file:///C:/Users/Gyandeep%20Nath/Downloads/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Student_login</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" type="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Not yet a hosteller? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>