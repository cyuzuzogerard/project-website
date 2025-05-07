<?php session_start();
if(isset($_SESSION["sender"]))
{
  
 ?>
 <?php
  $id=$_GET['dlp'];
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
            <h1>Delete Post</h1>
           <?php
include"../web_db/connection.php";
$query=mysqli_query($conn,"select*from posts where postid='$id'");
$check=mysqli_num_rows($query);
if ($check==1) 
{
while ($row=mysqli_fetch_array($query)) 
{
?>
<form method="POST" action="deletepost.php">
<table bgcolor="skyblue">
<tr><td>Are you sure you want delete</td>
<td><input type="text" name="" value="<?php echo $row['postname'];?>"></td>
    <td></td><td><input type="hidden" name="dlid" value="<?php echo $id; ?>"></td></tr>
<tr><td><input type="submit" name="yesbtn" value="YES"><input type="submit" name="nobtn" value="NO"></td></tr>
</tr>   
</table>
</form>
<?php
}
}
?>

<?php
if(isset($_POST['yesbtn']))
{
    $delid=$_POST['dlid'];
    include"../web_db/connection.php";
    $querydlt=mysqli_query($conn,"delete from posts where postid='$delid'");
    if($querydlt)
{

header("location:viewpost.php");
}
}
elseif(isset($_POST['nobtn']))
{
header("location:viewpost.php");
}
?>
        </div>
      
        <div id="footer">
           <?php
echo "<p>copyright &copy;Reserved By Gahanga 2019-" . date("y") . " Designed By Nura,Noella Ltd</p>";
?>
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