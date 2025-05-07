<?php session_start();
if(isset($_SESSION["sender"]))

 ?>
<?php
  $id=$_GET['upp']
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
            <h1>Update Post</h1>
            <?php
include "../web_db/connection.php";
$query=mysqli_query($conn,"select*from posts where postid='$id'");
$check=mysqli_num_rows($query);
if($check==1) 
{
while ($row=mysqli_fetch_array($query)) 
{
?>
<form method="POST" action="updatepost.php">
<table>
<tr><td>postName</td><td><input type="text" name="updtext" value="<?Php echo $row['postname']; ?>"><input type="hidden" value="<?php echo $id;?>" name="uid"></td></tr>
<tr><td></td><td><input type="submit" name="updatebtn" value="Update"></td></tr>
</table>
</form>
<?php
}
}
?>

<?php
if (isset($_POST["updatebtn"])) 
{
$text=$_POST["updtext"];
$upid=$_POST["uid"];
include "../web_db/connection.php";
$queryup=mysqli_query($conn,"update posts set postname='$text' where postid='$upid'");
if ($queryup) 
{
header("location:viewpost.php");
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
