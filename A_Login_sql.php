<?php
require('conn.php');
if(isset($_POST['Email_Address']) && isset($_POST['Passwords'])){
    $email = $_POST['Email_Address'];
    $password = $_POST['Passwords'];
    $sql ="SELECT* FROM admin1 where Email_Address='$email' AND Passwords='$password' limit 1";

$query = mysqli_query($conn,$sql);   
 if( mysqli_num_rows($query)==1){
    echo '<script> 
    alert("Login Successfully");
    window.location="A_Panel.php";
    </script>' ;
    exit;
   }
    else{  echo '<script> 
        alert("Incorrect data");
        window.location="A_Login.php";
        </script>' ;
      exit;} 
    }
?>