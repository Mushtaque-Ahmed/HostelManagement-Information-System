<?php
include 'config.php';
if (isset($_POST['submit'])) {
    


    $file = $_FILES['photo'];

    $filename = $file['name'];
    $fileerror = $file['error'];
    $filetmp = $file['tmp_name'];
    $id = $_POST['s_id'];

    $destinationfile = '../upload/' . $filename;
    move_uploaded_file($filetmp, $destinationfile);


    $insert = "insert into student_proof(id,photo) values('$id','$destinationfile') ";
    $res = mysqli_query($conn, $insert) or die("query faild" . mysqli_error($conn));
?>
    <script>
        alert(" successfully submitted");
        window.location.href='student_profile.php';
    </script>
<?php
}
?>