<?php session_start();
if(isset($_SESSION["sender"]))
{
  
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" type="text/css" href="../web_css/style1.css">
</head>
<body>

    <div id="layout">
        <div id="banner">
            <?php include "../web_includes/header.php"; ?>
        </div>

        <div id="menu">
           
            <div class="dropdown">
                <button class="dropbtn">POST</button>
                <div class="dropdown-content">
                    <a href="newpost.php">New post</a>
                    <a href="viewpost.php">View post</a>
                </div>
            </div>

               <div class="dropdown">
                <button class="dropbtn">CANDIDATE</button>
                <div class="dropdown-content">
                    <a href="newcandidate.php">New candidate</a>
                    <a href="viewcandidate.php">View candidate</a>
                </div>
            </div>

            


            <div class="dropdown">
                <button class="dropbtn">ACCOUNT</button>
                <div class="dropdown-content">
                    <a href="resetpassword.php">reset password</a>
                  
                </div>
            </div>
            <div class="dropdown">
                <form method="POST" action="logout.php">
                <button class="dropbtn" name="lobtn">Logout</button>
                </form>
               
            </div>
        </div>


        <div id="content">
            <h1>Reset Password</h1>
            <form action="resetpassword.php" method="POST">
            <table bgcolor="#ffaa00;">
            <tr><td>OLD PASSWORD</td><td><input type="password" name="pwd" autofocus placeholder="Enter old password" required></td>
            <td><input type="submit" name="checkbtn" value="Check"></td></tr>
            </table>    
            </form>

            <?php
            if (isset($_POST["checkbtn"])) 
            {
            $pass=$_POST["pwd"];
            include "../web_db/connection.php";
            $query=mysqli_query($conn,"select * from users where password='$pass'");
            $check=mysqli_num_rows($query);
            if ($check==1) 
            {
            while ($row=mysqli_fetch_array($query)) 
            {
            ?>
             <form action="resetpassword.php" method="POST">
             <table bgcolor="#ffaa00;">
            <input type="hidden"  name="id" value="<?php echo $row['id'];?>">
             <tr><td>NEW USERNAME</td><td><input type="text"  name="newuser" value="<?php echo $row['username'];?>" required> </td></tr>
             <tr><td> NEW PASSWORD</td><td><input type="password"  name="newpass"  required> </td></tr>
             <tr><td>CONFIRM PASSWORD</td><td><input type="password"  name="confpass" required></td></tr>
             <tr><td></td><td><input type="submit" name="updatebtn" value="UPDATE"></td></tr>
             </table>
             </form>

            <?php
            }
            }
            else
            {
            echo "SORRY PASSWORD IS INCORRECT";
            header("refresh:2;");
            }
            }
            ?>
             
      <?php
      if (isset($_POST["updatebtn"])) 
      {
       if (($_POST["newpass"]!=$_POST["confpass"])) 
        {
         echo "PLEASE PASSWORD DO NOT MATCH";
         header("refresh:2;");
         }
         else
         {
      include "../web_db/connection.php";
       $query=mysqli_query($conn,"select*from users where password='$_POST[newpass]'");
       $check=mysqli_num_rows($query);
       if ($check==1) 
       {
       while ($row=mysqli_fetch_array($query)) 
       {
        echo "SORRY PASSWORD IS ALREADY EXISTS";
        header("refresh:2;");
       }
       }
       else
       {
      $query=mysqli_query($conn,"update users set username='$_POST[newuser]',password='$_POST[newpass]' where id='$_POST[id]'");
       if ($query) 
        {
         //echo "PASSWORD RESETTED SUCCESSFULLY";
         header("location:../index.php");
          }//inner if
         }//close esle
           }// close outer else
           }//start if
            ?>

    </div>
      </div>
        <div id="footer">
           <?php
echo "<p>copyright &copy;Reserved By Gahanga 2019-" . date("y") . " Designed By Gerard Ltd</p>";
?>
        
    </div>

</body>
</html>
<?php

}
else{
    header("location:../index.php");
}
?>