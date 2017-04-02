<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Page</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="includes.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php include("header.php"); ?>
	<?php include("nav.php"); ?>
    <div id="container1">
        <div id="content">
            <?php
            if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] == 0))
            {
                header("Location: login.php");
                exit();
            }
            echo '<h2>Welcome to your page ';
            if (isset($_SESSION['username'])){
                echo "{$_SESSION['username']}!";
            }
            echo '</h2>';
            ?>
            <div id="midcol">
                <div id="mid-left-col">
                    <h4>Your Posts:-</h4>
                    <?php
                        require("mysqli_connect.php");
                        $uid = $_SESSION['user_id'];
                        $query = "SELECT title, id FROM post WHERE user_id=$uid";
                        $result = mysqli_query($dbcon, $query);
                        if(@mysqli_num_rows($result) == 0){
                            echo 'You have not posted anything yet.';
                        }
                        while($row = mysqli_fetch_array($result)){
                            echo '<a href="view_post.php?id=' . $row['id'] . '">' . $row['title'] . '</a><br>';
                        }
                    ?>
                </div>
                <div id="mid-right-col">
                    <h3></h3>
                    <p><b></b></p>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</body>
</html>
