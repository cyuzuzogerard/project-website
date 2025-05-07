s<?php session_start();
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
            

<h1>New Candidate</h1>
<form method="POST" action="newcandidate.php">
<table bgcolor="green">
<tr><td>Post Title<select name="slpost" required="">
    <option value="">Please select post</option>
    <?php
    include "../web_db/connection.php";
    $query=mysqli_query($conn,"select*from posts order by postname asc");
    while ($row=mysqli_fetch_array($query)) 
    {
    ?>
    <option><?php echo $row["postname"];?></option>
    <?php
     }
    ?>
</select><input type="submit" name="checkbtn" value="Check"></td></tr>  
</table>
</form>
<?php
if (isset($_POST["checkbtn"])) 
{
$slvalue=$_POST["slpost"];
include "../web_db/connection.php";
$queryvalue=mysqli_query($conn,"select*from posts where postname='$slvalue'");
$check=mysqli_num_rows($queryvalue);
if ($check==1) 
{
while ($rowvalue=mysqli_fetch_array($queryvalue)) 
{
?>
<form method="POST" action="newcandidate.php">
    <table bgcolor="orange">
    <tr><td>PostName</td><td><input type="text" name="pt" value="<?php echo $rowvalue['postname'];?>" readonly><input type="hidden" name="pfk" value="<?php echo $rowvalue['postid'];?>" ></td></tr>
    <tr><td>Candidate NID</td><td><input type="text" name="ci"></td></tr>   
    <tr><td>Firstname</td><td><input type="text" name="fn"></td></tr>   
    <tr><td>Lastname</td><td><input type="text" name="ln"></td></tr>
    <tr><td>Gender</td><td><input type="radio" name="sx" value="MALE">Male<input type="radio" name="sx" value="FEMALE">Female</td></tr>
    <tr><td>Date Of Birth</td><td><input type="date" name="db"></td></tr>   
    <tr><td>Date Of Exam</td><td><input type="date" name="de"></td></tr>
    <tr><td>Phone Number</td><td><input type="text" name="pn"></td></tr>
    <tr><td>Marks</td><td><input type="number" name="mk"></td></tr>
    <tr><td></td><td><input type="submit" name="savebtn" value="Save"></td></tr>
    </table>
</form>

<?php
}//end of while loop
}//end of inner if
}//end of outer if
?>

<?php
if (isset($_POST["savebtn"])) 
{
$pid=$_POST["pfk"];
$pname=$_POST["pt"];
$cnid=$_POST["ci"];
$fname=$_POST["fn"];
$lname=$_POST["ln"];
$gendar=$_POST["sx"];
$dob=$_POST["db"];
$doe=$_POST["de"];
$phone=$_POST["pn"];
$mks=$_POST["mk"];
include "../web_db/connection.php";
$querycheck=mysqli_query($conn,"select posts.postid,posts.postname,candidates.cnid,candidates.firstname,candidates.lastname,candidates.gendar,candidates.dateofbirth,candidates.postid,candidates.examdate,candidates.phone,candidates.marks from posts inner join candidates on posts.postid=candidates.postid where candidates.cnid='$cnid' and posts.postname='$pname'");
$check=mysqli_num_rows($querycheck);
if ($check==1) 
{
while ($row=mysqli_fetch_array($querycheck)) 
{
echo "Please Candidate is already registered";
header("refresh:2;");
}
}
else
{
$queryinsert=mysqli_query($conn,"insert into candidates values('','$cnid','$fname','$lname','$gendar','$dob','$pid','$doe','$phone','$mks')");
if ($queryinsert) 
{
echo "Candidate Registered Successfully";
header("refresh:2;");
}
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