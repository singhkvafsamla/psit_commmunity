<!DOCTYPE html>
<?php
include "db.php";
session_start();
if(isset($_POST['submit']))
{
    $email=$_POST['user'];
    $pass=md5($_POST['pass']);
    $link=mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    $result=mysqli_query($link, "select name from user where email='$email' and pass='$pass'");
    if(mysqli_affected_rows($link)>0)
    {
        $row=mysqli_fetch_array($result);
        $name=$row[0];
        setcookie("group",$email,time()+(86400*7),"/");
        setcookie("name",$name,time()+(86400*7),"/");
        $_SESSION[$email]=$email;
        mysqli_close($link);
        header("location:home.php");
    }
    mysqli_close($link);
}
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantamaran">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="../css/login.css?v=<?php echo time();?>" class="css">

	<title>PSIT Community</title>

	<!--  -->


</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PSIT Community</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home" style="font-size:20px;color:red"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="eventwall.html"><i class="fa fa-tasks" style="font-size:15px;color:red"></i> Event Wall</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fa fa-user-plus" style="font-size:20px;color:red"></i> Join Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fa fa-sign-in" aria-hidden="true" style="font-size: 20px;color: red"></i> Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">About</a>
        </li>
        
        
        
      </ul>

      
    </div>
  </div>
</nav>


<div class="loginBox">
        <img src="../images/COMMU.png" class="avatar">
        <h1>LOGIN HERE</h1>
        <form method="post">
            <p>User name</p>
            <input type="text" name="user" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            <a href="#">Forgot Password   </a>
            
            <a href="index.php">New User?</a>
        </form>
    </div>

  
 



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	

	<script>
        
	</script>

</body>

</html>
