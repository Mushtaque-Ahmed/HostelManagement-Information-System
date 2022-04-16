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
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="../admin_login/style1.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <div class="logo_name">Student Panel</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
        <a href="welcome.php">
          <i class='bx bxs-dashboard'></i>
          <span class="links_name">Dashboard </span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li> -->
      <li>
        <a href="student_profile.php">
          <i class='bx bx-user'></i>
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
            <div class="name"><?php echo ($_SESSION['s_username']) ?></div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">Profile</div>
    <table class="content-table">
      <thead>
        <tr>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Date of birth</th>


          <th scope="col">Password</th>
          <th scope="col">Room id</th>
          <th scope="col">Fee Status</th>

        </tr>
      </thead>
      <tbody>
        <?php
        include 'config.php';
        if (!mysqli_select_db($conn, 'admin_login_register')) {
          echo 'DB NOT SELECTED';
        }

        $id = $_SESSION['s_id'];

        $sql = "select * from student where s_id ='$id'";
        $result = mysqli_query($conn, $sql) or die("query failed:" . mysqli_error($conn));
        $i = 1;
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

        ?>

            <tr>
              <td scope="row"><?php echo $id ?></td>
              <td><?php echo $row['s_username']; ?></td>
              <td><?php echo $row['s_email']; ?></td>
              <td><?php echo $row['s_dob']; ?></td>
              <td><?php echo $row['s_password']; ?></td>
              <td><?php echo $row['s_roomid']; ?></td>


              <?php
              if ($row['status'] == 1) {
                echo '<td class="text-success"><b>Paid</b></td>';
              } else {
                echo '<td class="text-danger"><b>UnPaid</b></td>';
              }
              ?>


              </td>
            </tr>

        <?php
          }
        } else {
          echo "0 result";
        }


        ?>

      </tbody>
    </table>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card w-75">
            <div class="card-body">
              <h5 class="card-title">Complain here</h5>
              <p class="card-text">Do you have any problem ? Without hesitation you write here ... </p>
              <a href="student_complain.php" class="btn btn-outline-danger">click here</a>
            </div>
          </div>

        </div>
        <div class="col-lg-4">
          <div class="card w-75">
            <div class="card-body">
              <h5 class="card-title">Scan </h5>
              <p class="card-text">Do you  paid ? Upload sniped... </p>
              <a href="student_proof_money.php" class="btn btn-outline-danger">click here</a>
            </div>
          </div>

        </div>
        <div class="col-lg-4">
          <div class="card text-center">
            <div class="card-header">
              Change Password
            </div>
            <div class="card-body">

              <form action="new_password.php" method="post">
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
                  <?php $sql1 = "select * from student where s_id ='$id'";
                  $res = mysqli_query($conn, $sql1) or die("query failed:" . mysqli_error($conn));
                  if (mysqli_num_rows($res)) {
                    while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                      <input type="hidden" name="s_id" class="form-control" value="<?php
                                                                                    echo $row['s_id'] ?>" id="exampleInputPassword1">
                  <?php
                    }
                  }
                  ?>

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="password" name="oldpassword" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1">
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-outline-danger">Submit</button>
              </form>


            </div>

          </div>
        </div>
      </div>
    </div>


  </section>

  <script src="../admin_login/script.js"></script>

</body>

</html>