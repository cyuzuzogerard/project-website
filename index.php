<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" type="text/css" href="./web_css/style1.css">
</head>
<body>

  
      <div id="layout">
<div id="banner">
            <?php include "./web_includes/header.php"; ?>
        </div>

    <div id="menu">
           <h1 style="margin: 10px;">Login page<h1>
            
            </div>

            <div class="dropdown">
              
            </div>

           
        </div>

        <div id="content">
           
          <form action="index.php" method="POST">
            <table border="0">
              <tr>
                <td>Username </td><td>
              <input type="text" name="us"></tr>
              <tr>
                <td>password </td><td>
              <input type="password" name="ps"></td></tr>
        <tr>
          <td><button name="loginbtn" value="Login">login</button>
          </td>
        </tr>
            </table>
          </form>
            <?php
    if(isset($_POST['loginbtn'])){
       include "./web_db/connection.php";
      $uname=$_POST["us"];
      $psw=$_POST["ps"];
      $select=mysqli_query($conn,"SELECT * FROM users WHERE username='$uname' AND password='$psw'");
      $check=mysqli_num_rows($select);
      if($check==1) {
      while($row=mysqli_fetch_array($select))
        $_SESSION["sender"]=$row["password"];
     {
      header("location:./frontend/home.php");
        
        }
      }
      else{
      echo "username or password is incorrect";
     header("refresh:2;");  
      }

    }
    ?> 
        </div>
        
        <div id="footer">
            &copy; 2008-2090 GAHANGA
        </div>
    </div>
   

</body>
</html>
