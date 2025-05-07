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
                <button class="dropbtn">Registration</button>
                <div class="dropdown-content">
                    <a href="newstudent.php">New student</a>
                    <a href="viewstudent.php">View student</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Permission</button>
                <div class="dropdown-content">
                    <a href="recordstudent.php">Record student</a>
                    <a href="viewstudent.php">View student</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Logout</button>
            </div>
        </div>

        <div id="content"></div>
        
        <div id="footer">
            &copy; 2008-2090 GAHANGA
        </div>
    </div>

</body>
</html>
