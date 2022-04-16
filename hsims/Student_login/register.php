<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$dob = $_POST['dob'];
	$contact = $_POST['contact'];
	$gname = $_POST['gname'];
	$gcontact = $_POST['gcontact'];
	$address = $_POST['address'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$department = $_POST['department'];
	$semester = $_POST['semester'];
	$id = $_POST['id'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM student WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO student (s_username, s_email, s_password, s_dob, s_contact, s_gname, s_gcontact, s_address, s_fname, s_mname, s_department, s_semester,s_roomid)
					VALUES ('$username', '$email', '$password', '$dob', '$contact', '$gname', '$gcontact', '$address', '$fname', '$mname', '$department', '$semester', '$id')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Student Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				$dob = "";
				$contact = "";
				$gname = "";
				$gcontact = "";
				$address = "";
				$fname = "";
				$mname = "";
				$department = "";
				$semester = "";
				$id = '';
			} else {
				echo "<script>alert('Woops! Something Went Wrong.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
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

	<title>Student_registration</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="number" placeholder="Student Id" name="id" value="<?php echo $id; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username or full name(In block letters)" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<input type="date" placeholder="Date of birth" name="dob" value="<?php echo $_POST['dob']; ?>" required><br>
			</div>
			<div class="input-group">
				<input type="tel" placeholder="Contact no" name="contact" value="<?php echo $_POST['contact']; ?>" required>
			</div>
			<div class="input-group"> 
				<input type="text" placeholder="Local guardian's name" name="gname" value="<?php echo $_POST['gname']; ?>" required>
			</div>
			<div class="input-group">
				<input type="tel" placeholder="Local guardian's contact" name="gcontact" value="<?php echo $_POST['gcontact']; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Address" name="address" value="<?php echo $_POST['address']; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Father's name" name="fname" value="<?php echo $_POST['fname']; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Mother's name" name="mname" value="<?php echo $_POST['mname']; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Department" name="department" value="<?php echo $_POST['department']; ?>" required>
			</div>
			<div class="input-group">
				<input type="number" placeholder="Semester" name="semester" value="<?php echo $_POST['semester']; ?>" required>
			</div>  
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>