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
                    <a href="newcandidate.php">new candidate</a>
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
            <h1>Record New Post </h1>
             
            <table border="0">
                 <form action="newpost.php" method="POST">
              <tr>
                <td>Username </td><td>
              <input type="text" name="pn"></tr>
            <td></td><td>
              <input type="submit" name="savebtn" value="save"></tr>
      </td></tr></form></table>
                    <?php

                  if (isset($_POST['savebtn'])) {

                $pn=$_POST['pn'];
                include"../web_db/connection.php";
                $query=mysqli_query($conn,"insert into posts(postid,postname)values('','$pn')");
                if ($query) {
                    echo"Data saved";
                    header("refresh:2;");
                        
                  }else{
                    echo "failed";
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
<?php

}
else{
    header("location:../index.php");
}
?>