<?php
require('conn.php');
if((isset($_POST['A_Name']) && isset($_POST['Email_Address'])) && isset($_POST['Passwords'] ) ){

$name = $_POST['A_Name'];
$email = $_POST['Email_Address'];
$password = $_POST['Passwords'];

$sql ="INSERT INTO admin1(A_Name,Email_Address,Passwords)
      VALUES('$name','$email','$password')";
 $query = mysqli_query($conn,$sql);    
      if($query){
      echo '<script> 
      alert("Data Inserted Successfully");
      window.location="A_Login.php";
      </script>' ;
     }
      else{ echo '<script> 
            alert("Failed");
            window.location="A_Login.php";
            </script>' ;}    
}
else{   
      echo '<script> 
      alert("Failed");
      window.location="A_Login.php";
      </script>' ;  

}

?>