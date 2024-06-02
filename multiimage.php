<?php

 if(isset($_POST['submit']))
	 {
		 
		
		 if ($_POST['type'] == 'Multiple'){
		 foreach ($_FILES['simage']['tmp_name'] as $key => $val )
		 
		 {
                    move_uploaded_file($_FILES['simage']['tmp_name'][$key],"img/".$_FILES['simage']['name'][$key]);
                    $image="img/".$_FILES['simage']['name'][$key];
           		 $sql=mysqli_query($conn, "INSERT INTO comboffer (image ) VALUES ('$image')");
				}
		 }
		 else
		 {
			 
			 move_uploaded_file($_FILES['image']['tmp_name'],"img/".$_FILES['image']['name']);
$image="img/".$_FILES['image']['name'];


			 $sql=mysqli_query($conn, "INSERT INTO comboffer (image) VALUES ('$image')");
		 }
				
			 if($sql)
 {
  echo "<Script>alert('Details Inserted Successfully')</script>";
 }
 else
 {
	 echo "<Script>alert('Insertion Failed')</script>";
 }
		 
	 }

?>