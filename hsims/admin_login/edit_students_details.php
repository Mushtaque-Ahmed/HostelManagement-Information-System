<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}
include 'config.php';
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($conn, $_GET['type']);
    if ($type == 'status') {
        $operation = mysqli_real_escape_string($conn, $_GET['operation']);
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        if ($operation == 'paid') {
            $status = '1';
        } else {
            $status = '0';
        }
        $update = "update student set status='$status' where s_id='$id'";
        mysqli_query($conn, $update);
    }
    if ($type == 'delete') {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $delete = "delete from student where s_id='$id'";
        mysqli_query($conn, $delete) or die("delete query faild:" . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage students details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        button {
            font-size: 10px;
            border: none;
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            margin: 4px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">AdminPanel</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="admin_profile.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <li>
                <a href="edit_students_details.php">
                    <i class='bx bx-user-plus'></i>
                    <span class="links_name">Edit Student Details</span>
                </a>
                <span class="tooltip">Edit Student Details</span>
            </li>
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
                        <div class="name"><?php echo ($_SESSION['username']); ?>
                            <i class='bx bx-user'></i>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Edit Student Details</div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Contact no</th>
                    <th scope="col">Guardian's name</th>
                    <th scope="col">Guardian's contact</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Fee status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $limit = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
                $sql = "SELECT * FROM student order by s_id asc limit  {$offset},{$limit}";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td scope="row"><?php echo  $row['s_id']; ?></td>
                            <td><?php echo  $row['s_username']; ?></td>
                            <td><?php echo   $row['s_email']; ?></td>
                            <td><?php echo   $row['s_dob']; ?></td>
                            <td><?php echo  $row['s_contact']; ?></td>
                            <td><?php echo  $row['s_gname']; ?></td>
                            <td><?php echo  $row['s_gcontact']; ?></td>

                            <td>
                                <button><a href="update_student_details.php?id=<?php echo $row['s_id'] ?>">Update</a></button>
                                <?php echo '<button><a href="?type=delete&id=' . $row['s_id'] . '">Delete</a></button>' ?>
                            </td>
                            <td><?php

                                if ($row['status'] == 1) {
                                    echo '<span class="paid"><a href="?type=status&operation=unpaid&id=' . $row['s_id'] . '">paid</a>
            </span>';
                                } else {
                                    echo '<span class=unpaid><a href="?type=status&operation=paid&id=' . $row['s_id'] . '">unpaid</a>
              <span>';
                                } ?>

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
        <!-- pagination -->
        <?php


        $q = "select * from student";
        $res = mysqli_query($conn, $q) or die("query failed" . mysqli_error($conn));
        if (mysqli_num_rows($res) > 0) {
            $total_record = mysqli_num_rows($res);

            $total_page = ceil($total_record / $limit);
            echo ' <ul class="pagination justify-content-center">';
            if ($page > 1) {
                echo '<li class="page-item"><a class="page-link" href="edit_students_details.php?page=' . ($page - 1) . '">previous</a></li>';
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page) {
                    $active = "active";
                } else {
                    $active = "";
                }
                echo '<li class="page-item ' . $active . '"><a class="page-link" href="edit_students_details.php?page=' . $i . '">' . $i . '</a></li>';
            }
            if ($total_page > $page) {
                echo '<li class="page-item"><a class="page-link" href="edit_students_details.php?page=' . ($page + 1) . '">next</a></li>';
            }
            echo '</ul>';
        }
        ?>
    </section>

    <script src="script.js"></script>

</body>

</html>