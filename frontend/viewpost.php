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
                <h1>View Post</h1>
                <?php
           include"../web_db/connection.php";

            echo "<table border='1'>";
            echo "<tr>"."<th>"."No"."</th>"."<th>"."Postname"."</th>"."<th colspan='2'>"."Action"."</th>"."</tr>";
             $i=1;
             $query=mysqli_query($conn,"select*from posts order by Postname asc");
             while ($row=mysqli_fetch_array($query)){
                 echo"<tr>"."<td>".$i."</td>"."<td>".$row['postname']."</td>"."<td>"."<button><a href='updatepost.php? upp=".$row['postid']."'>Update</a></button>"."</td>"."<td>"."<button><a href='deletepost.php? dlp=".$row['postid']."'>Delete</a></button>"."</td>"."</tr>";
                 $i++;
             }
echo "</table>";
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