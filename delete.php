<?php 
     $id=$_GET["id"];

           $del=mysqli_query($conn,"DELETE FROM form2 WHERE id ='$id'");
           echo "<script> alert('detele  Successfully')</script>";

      //header("Location: register.php");
?>