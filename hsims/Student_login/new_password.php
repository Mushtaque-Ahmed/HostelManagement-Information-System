<?php
 include 'config.php';
 if(!mysqli_select_db($conn,'admin_login_register')){
     die("db not selected");
 }
 
 if(isset($_POST['submit'])){
     $id=$_POST['s_id'];
     $oldpassword=$_POST['oldpassword'];
     $newpassword=$_POST['newpassword'];
    
     $sql="select s_password from student where s_id='$id' and s_password='$oldpassword'";
     $res=mysqli_query($conn,$sql) or die("query failed:".mysqli_error($conn));
     if(mysqli_num_rows($res)==1){
       
         
         $update="update student set s_password='$newpassword' where s_id='$id'";
         mysqli_query($conn,$update) or die("2nd query failed :".mysqli_error($conn));
         header('location:student_profile.php');
     }else{
         ?>
         <script>alert('old passwordm is not match')
         window.location.href='admin_profile.php'</script>
         
         <?php
     
    }

 }
?>