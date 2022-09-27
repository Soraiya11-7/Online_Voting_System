<?php
require('conn.php');
if(isset($_POST['Email_Address']) && isset($_POST['Passwords'])){
    $email = $_POST['Email_Address'];
    $password = $_POST['Passwords'];
    $sql ="SELECT * FROM student_list where Email_Address='$email'";

    $query = mysqli_query($conn,$sql);   
    $res = mysqli_fetch_array($query);
 if( mysqli_num_rows($query)==1 && password_verify($password, $res['Passwords'])){
    setcookie('_roll', $res['Roll'], time() + (86400 * 30), "/");
    setcookie('_pass', $password, time() + (86400 * 30), "/");
    echo '<script> 
    alert("Login Successfully");
    window.location="Voter_Panel.php";
    </script>' ;
    exit;
   }
    else{  echo '<script> 
        alert("Incorrect data");
        window.location="A_std_Login.php";
        </script>' ;
      exit;} 
    }
?>