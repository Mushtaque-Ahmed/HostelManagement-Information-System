<?php 

session_start();

if (!isset($_SESSION['s_username'])) {
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student panel</title>
    <link rel="stylesheet" href="../admin_login/style1.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Student Panel</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="welcome.php">
         <i class='bx bxs-dashboard'></i>
          <span class="links_name">Dashboard </span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="student_profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Profile</span>
       </a>
       <span class="tooltip">Profile</span>
     </li>
     <!-- <li>
       <a href="manage_students.php">
         <i class='bx bx-user-plus'></i>
         <span class="links_name">Manage Students</span>
       </a>
       <span class="tooltip">Manage Students</span>
     </li> -->
     <!-- <li>
       <a href="#">
         <i class='bx bx-money'></i>
         <span class="links_name">Fee Details</span>
       </a>
       <span class="tooltip">Fee Details </span>
     </li> -->
     <li>
     <a href="logout.php">
         <i class='bx bx-log-out' id="log_out"></i>
         <span class="links_name">Log out</span>
        </a>
         <span class="tooltip">Log out </span>
    </li>     
     <li class="profile">
         <div class="profile-details">
           <div class="name_job">
            <div class="name"><?php echo($_SESSION['s_username']); ?></div>
           </div>
          </div>   
       </li>
     </ul>
  </div>
  <section class="home-section">
      <div class="text">Dashboard <?php echo $_SESSION['s_username'] ?></div>
  </section>

  <script src="../admin_login/script.js"></script>

</body>
</html>
