<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script>
        $(document).ready(function(){
        $("input[type='radio']").change(function(){
           if($(this).val()=="Single")
             {
                $("#otherAnswer1").hide();
                $("#otherAnswer").show();
             }
           else if($(this).val()=="Multiple")
             {
                $("#otherAnswer").hide(); 
                $("#otherAnswer1").show();
             } 
         });
         });
</script>
<?php include 'connect.php'  ?>

<?php

if(isset($_POST['submit']))
    {
        
        $username=$_POST['username'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        

       
        if ($_POST['type'] == 'Multiple'){
        foreach ($_FILES['simage']['tmp_name'] as $key => $val )
        
        {
                   move_uploaded_file($_FILES['simage']['tmp_name'][$key],"img/".$_FILES['simage']['name'][$key]);
                   $image="img/".$_FILES['simage']['name'][$key];
                   
                   $sql=mysqli_query($conn, "INSERT INTO form3 (username, gender, email, phone, address, image) 
                   VALUES ('$username','$gender','$email','$phone','$address','$image')");
               }
        }
        else
        {
            
            move_uploaded_file($_FILES['image']['tmp_name'],"img/".$_FILES['image']['name']);
$image="img/".$_FILES['image']['name'];


$sql=mysqli_query($conn, "INSERT INTO form3 (username, gender, email, phone, address, image) 
VALUES ('$username','$gender','$email','$phone','$address','$image')");
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




<Html>  
    <head>
    <link rel="stylesheet" href="css/form3.css" type="text/css">
    <style>
         table {
            border-collapse: collapse;
            width: 100%;
           
        }

        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
      </style>



    <title>  
    Registration Page  
    </title>  
    </head> 

    <br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container">
    <div class="content">
       <img     width="100%" height="25%" src="https://res.cloudinary.com/debbsefe/image/upload/f_auto,c_fill,dpr_auto,e_grayscale/image_fz7n7w.webp" alt="header-image" class="cld-responsive">
            <h1 class="form-title">Register Here</h1>

            <form id="form" class="form" method= "post" enctype="multipart/form-data">
               
            <div>
              <label for="username" >Name:</label>
              <input type="text" name="username"  pattern="[A-Za-z ]{1,32}"
               id="username" placeholder="Enter username"   required>
            </div>
             
             <br> 

            <div class="beside">
            <label for="gender">   
                Gender :  
            </label><br>  
            <input id="gender" type="radio" value="Male" name="gender"/> Male <br>  
            <input id="gender" type="radio" value="Female" name="gender"/> Female <br>  
            <input id="gender" type="radio" value="Other" name="gender"/> Other  
            </div>

            <br>
 
            <div class="form-control">
              <label for="email">Email</label>
              <input type="text" name="email"  id="email" placeholder="Enter email"  required />
            </div>

            <br>

            <div>
              <label for="phone">   
               Phone :  
              </label>  
              <input type="text" id="phone" name="phone" size="10"  required>  
            </div>

            <br>

            <div>
            <label> 
               Address </label> 
                <br>  
            <textarea cols="55" for="address" rows="5" name="address" > </textarea>
            </div>

            <br>

            <div>
            <label for="file">Uploade Files:</label>  
            <input type="radio" id="file" name="type" value="single" required> single
            <input type="radio" name="type" value="Multiple"> Multiple

            <input  class="form-control" type="file" name="simage[]" id="otherAnswer1" Multiple>
	        <input  style="display:none;" class="form-control" type="file" name="image" id="otherAnswer">

            </div>
          <br>

             <button type="submit" name="submit" >Submit </button>  
            </form>



        </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
 <table>
        <tr>
            <th>S.NO</th>
            <th>name</th>
            <th>gender</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $x=1;
        $sqll=mysqli_query($conn, "SELECT * FROM form3");
          while ($row=mysqli_fetch_array($sqll))
          {
        ?>
        <tr>
          <td><?php echo $x?></td>
          <td><?php echo $row['username']?></td>
          <td><?php echo $row['gender']?></td>
          <td><?php echo $row['email']?></td>
          <td><?php echo $row['phone']?></td>
          <td><?php echo $row['address']?></td>
          <td> <img src="<?php echo $row['image']?>" width="50px" height="50px" alt=""> </td>
          

          <td> <a tittle="edit" href="onlineedit.php?id=<?php echo $row['id']; ?>">
            <img src="../html_form3/image/edit.png" width="30px" height="30px" alt="edit"   ></a>
          </td>

          <td><a tittle="delete" href="onlinedelete.php?id=<?php echo $row['id']; ?>">
            <img src="../html_form3/image/delete.png" width="30px" height="30px" alt="delete"></a>
          </td>

  
        </tr>

      <?php $x++; }?>
    </table>

    </body>  
    </html>
