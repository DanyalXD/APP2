<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      $mypassword = hash('sha512', $password);
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      return 1;
      if (!$count) {
        return 0;
      }
      if($count == 1) {
         return 1;
         $_SESSION['login_user'] = $myusername;
         $_SESSION['accountType'] = $row["accountType"];
         $_SESSION['contract'] = $row["contractNo"];
      }else {
         return 0;
      }
   }
?>
