<?php

session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location: admin_login.php");
// }
include 'config.php';
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($conn, $_GET['type']);

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
                <a href="admin_panel.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
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
        <div class="text">Update Student Details</div>
        <div class="container">
            <?php
            if (isset($_GET['id'])) {
                $student_id = $_GET['id'];
            }
            $sql = "select * from student where s_id=' $student_id'";
            $res = mysqli_query($conn, $sql) or die("query failed :" . mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <form action="" method="post">
                        <div class="row">
                        <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"></label>
                                    <input type="hidden" name="s_id" class="form-control" id="exampleFormControlInput1" placeholder="roomn id" value="<?php echo $row['s_id'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Room Id</label>
                                    <input type="text" name="room_id" class="form-control" id="exampleFormControlInput1" placeholder="roomn id" value="<?php echo $row['s_roomid'] ?>">
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Student Name</label>
                                    <input type="text" name="student_name" class="form-control" id="exampleFormControlInput1" placeholder="enter student name" value="<?php echo $row['s_username'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> Date of birth</label>
                                    <input type="date" name="dob" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['s_dob'] ?>">
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $row['s_email'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="mobile nomber" value="<?php echo $row['s_contact'] ?>">
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Local Guardian</label>
                                    <input type="text" name="local_guardian" class="form-control" id="exampleFormControlInput1" placeholder="Local Guardian" value="<?php echo $row['s_gname'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Local Guardian Phone</label>
                                    <input type="text" name="phone_l_guardian" class="form-control" id="exampleFormControlInput1" placeholder="Local Guardian Phone" value="<?php echo $row['s_gcontact'] ?>">
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Father's Name</label>
                                    <input type="text" name="father" class="form-control" id="exampleFormControlInput1" placeholder="Father Name" value="<?php echo $row['s_fname'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Mother's Name</label>
                                    <input type="text" name="mother" class="form-control" id="exampleFormControlInput1" placeholder="mother's name" value="<?php echo $row['s_mname'] ?>">
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">address</label>
                                    <textarea type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="enter address"> <?php echo $row['s_address'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control" id="exampleFormControlInput1" placeholder="Department" value="<?php echo $row['s_department'] ?>">
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Semester</label>
                                    <input type="text" name="sem" class="form-control" id="exampleFormControlInput1" placeholder="Semester" value="<?php echo $row['s_semester'] ?>">
                                </div>
                            </div>
                        </div>

                        <button class=" btn btn-outline-danger" name="submit">Sumbit</button>
                    </form>
            <?php

                }
            }
            ?>

        </div>

    </section>

    <script src="script.js"></script>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $id=$_POST['s_id'];
    $room_id = $_POST['room_id'];
    $student_name = $_POST['student_name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $local_guardian = $_POST['local_guardian'];
    $phone_l_guardian = $_POST['phone_l_guardian'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $sem = $_POST['sem'];

    $update="update  student set s_roomid='$room_id', s_username='$student_name', s_dob='$dob',s_email='$email',
    s_contact='$phone', s_gname='$local_guardian', s_gcontact=' $phone_l_guardian',s_fname='$father',
    s_mname='$mother', s_address='$address',s_department='$department', s_semester='$sem' where s_id='$id'";
    if(mysqli_query($conn,$update) or die("update query failed:".mysqli_error($conn))){
        ?>
          <script>alert("updated successfully")
        window.location.href="edit_students_details.php"</script>
        <?php
    }

}
?>