<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
include 'config.php';
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($conn, $_GET['type']);
   
    
    if ($type == 'delete') {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $delete = "delete from complain where id='$id'";
        mysqli_query($conn, $delete) or die("delete query faild:" . mysqli_error($conn));
    }
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
            <li>
                <a href="welcome.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="links_name">Dashboard </span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="admin_profile.php">
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
            <li>
                <a href="fee_details.php">
                    <i class='bx bx-money'></i>
                    <span class="links_name">Fee Details</span>
                </a>
                <span class="tooltip">Fee Details </span>
            </li>
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
                        <div class="name"><?php echo ($_SESSION['username']) ?></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Profile</div>
        <table class="table table-sm">
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Complain letter</th>
                    <th scope="col">Delete</th>

                   
                </tr>
            </thead>
            <tbody>
            <?php
                include 'config.php';
                if (!mysqli_select_db($conn, 'admin_login_register')) {
                    echo 'DB NOT SELECTED';
                }

                $sql = "select * from complain INNER JOIN student
                ON complain.id = student.s_id";
                $result = mysqli_query($conn, $sql) or die("query failed:" . mysqli_error($conn));
                $i = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo $row['s_username'] ?></td>
                    <td><p><?php echo substr($row['complain_letter'],0,50) . "...";?></p><a class="btn btn-danger" href="read_more.php?id=<?php echo $row['id'] ?>">read more</a></td>
                    <td><a href="?type=delete&id=<?php echo $row['id'] ?>">delete</a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
       



    </section>

    <script src="../admin_login/script.js"></script>

</body>

</html>