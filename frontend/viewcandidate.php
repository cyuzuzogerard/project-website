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
            <h1>view candidate</h1>
<form method="post" action="viewcandidate.php">
<table bgcolor="orange">
    <tr><td>postname</td><td><select name="pn">
        <option value="">please select post</option>
        <?php
        include"../web_db/connection.php";
        $query=mysqli_query($conn,"select distinct postname from posts inner join candidates on posts.postid=candidates.Post_id order by postname asc");
        while ($row=mysqli_fetch_array($query)) 
        {
            ?>
            <option><?php echo $row["postname"];?></option>
        <?php }?>
    </select></td><td><input type="submit" name="checkbtn" value="check"></td></tr>
</table></form>

<?php 
if (isset($_POST["checkbtn"])){
    $pname=$_POST["pn"];
    include"../web_db/connection.php";
    $select=mysqli_query($conn,"select posts.postid,posts.postname,candidates.cnid,candidates.fastname,candidates.lastname,candidates.gendar,candidates.Phone_number,candidates.marks,candidates.Date_of_birth,candidates.Exam_date from posts inner join candidates on posts.postid=candidates.Post_id where posts.postname='$pname'order by candidates.marks desc");
   

        echo"<table border='1'>";
        echo"<tr bgcolor='orange'>"."<th>"."no"."</th>"."<th>"."NATIONAL ID"."</th>"."<th>"."LASTNAME"."</th>"."<th>"."GENDAR"."</th>"."<th>"."DATE OF BIRTH"."</th>"."<th>"."POSTNAME"."</th>"."<th>"."EXAM DATE"."</th>"."<th>"."PHONE NUMBER"."</th>"."<th>"."marks"."</th>"."</tr>";
        $i=1;
        
        while($rowca=mysqli_fetch_array($select)){
            echo"<tr>"."<td>".$i."</td>"."<td>".$rowca["cnid"]."</td>"."<td>".$rowca["fastname"]."</td>"."<td>".$rowca["lastname"]."</td>"."<td>".$rowca["gendar"]."</td>"."<td>".$rowca["Date_of_birth"]."</td>"."<td>".$rowca["postname"]."</td>"."<td>".$rowca["Exam_date"]."</td>"."<td>".$rowca["Phone_number"]."</td>"."<td>".$rowca["marks"]."</td>"."</tr>";
        $i++;  
    }

 
    echo"</table>";
   }
    ?>
         

    
</table>

  </form>
            


      
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