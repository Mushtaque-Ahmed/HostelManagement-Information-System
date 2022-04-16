
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
          <script>alert("updated successfully")</script>
        <?php
    }

}
?>