<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $id = $_POST['s_id'];
    $complain = $_POST['complain'];

   
    $insert = "insert into complain(id,complain_letter) values('$id','$complain') ";
    $res = mysqli_query($conn, $insert) or die("query faild" . mysqli_error($conn));
?>
    <script>
        alert(" successfully submitted");
        window.location.href='student_profile.php';
    </script>
<?php
}
?>