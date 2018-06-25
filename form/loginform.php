<?php
session_start();
include 'connection.php';
//include 'logvalid.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
	<link rel="stylesheet" type="text/css" href="regform.css">
  <script type="text/javascript" src = "reg.js"></script>
    </head>
<body>
<form name="login" id="form" action="n2.php" method="POST">
 


  <fieldset id="field">
  <legend style="font-size: 40px;font-weight:bold;color:#000;text-shadow: 0px 3px 5px brown; 
">Log-In</legend>

        <section class="l-a">
            <label id="p">UserId</label><br>
            <input type="text" name="userid" id="i1" required/>
            <h4 id="p1"><?php echo $_SESSION['err1'];?></h4>
           
        </section>
        <section class="l-b">   
            <label id="q">Password</label><br>
            <input type="password" name="password" id="i2" required>
            <h4 id="p2"><?php echo $_SESSION['err2']; ?></h4>
            
        </section>
        <input type="submit" id="button" value="LOG-IN" style="margin-right: 8px;">
        <button id="button"><a href="home.php">HOME</a></button> 
 </fieldset>
 
</form>
</body>
</html>
