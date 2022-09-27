<?php
require('conn.php');
if((isset($_POST['Roll']) && isset($_POST['Student_Name'])) && (isset($_POST['Email_Address']) && ( (isset($_POST['Phone_Number'])) && isset($_POST['Passwords']) ))){
$roll = $_POST['Roll'];
$name = $_POST['Student_Name'];
$email = $_POST['Email_Address'];
$phone = $_POST['Phone_Number'];
$password = $_POST['Passwords'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$sql ="INSERT INTO student_list(Roll,Student_Name,Email_Address,Passwords,Phone_Number)
      VALUES('$roll','$name','$email','$hashed_password','$phone')";
 $query = mysqli_query($conn,$sql);    
      if($query){
      echo '<script> 
      alert("Data Inserted Successfully");
      window.location="A_std_Login.php";
      </script>' ;
     }
      else{ echo '<script> 
            alert("Failed");
            window.location="A_std_Login.php";
            </script>' ;}    
}
else{   
      echo '<script> 
      alert("Failed");
      window.location="A_std_Login.php";
      </script>' ;  

}



?>