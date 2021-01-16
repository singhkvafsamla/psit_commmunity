<!DOCTYPE html>
<?php
include "db.php";
session_start();
if(isset($_COOKIE['group']))
{
    if(isset($_SESSION[$_COOKIE['group']]))
    {
    header("location:home.php");
    }
    else
    {
        setcookie("group","",time()-3600,'/');
        setcookie("name","",time()-3600,"/");
    }
}
if(isset($_POST['register']))
{
    
    $name=strtoupper($_POST['name']);
    $email=$_POST['email'];
    $roll=$_POST['roll'];
    $sid=$_POST['sid'];
    $pass=md5($_POST['pass']);
    $branch=$_POST['branch'];
    
    $link=  mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    mysqli_query($link,"INSERT INTO `user`(`name`, `email`, `roll`, `sid`, `pass`, `branch`) VALUES ('$name','$email','$roll','$sid','$pass','$branch')");
    if(mysqli_affected_rows($link)>0)
    {
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
	<link rel="stylesheet" href="../css/index_css.css" class="css">

	<title>PSIT Community</title>

	<!--  -->

	<style>
* {
  box-sizing: border-box;
}

.row {
  display: flex;
}


.column1 {
    
     
  flex: 50%;

  padding: 10px;
  height: 500px; 
}
.column2 {
    
     
  flex: 50%;

  padding: 10px;
  height: 500px; 
}
</style>
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
          <a class="nav-link active" aria-current="page" href="home.php"><i class="fa fa-home" style="font-size:20px;color:red"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="eventwall.html"><i class="fa fa-tasks" style="font-size:15px;color:red"></i> Event Wall</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fa fa-user-plus" style="font-size:20px;color:red"></i> Join Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="login.php"><i class="fa fa-sign-in" aria-hidden="true" style="font-size: 20px;color: red"></i> Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about.php">About</a>
        </li>
        
        
        
      </ul>

      
    </div>
  </div>
</nav>

<div class="psit-image">
    <img src="../images/bg3.jpg" alt="" width="100%" height="300px">
    <div class="slogan">
       <h2>Welcome to PSIT Community</h2>
        <h5>Let's Learn together</h5>

        </div>
    
</div>


<div class="container-fluid ">
      <div class="shadow-sm p-3 mb-5 bg-white rounded">
      <div class="card p-3 mt-3 ">
       <form method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="name"  class="form-control" id="inputEmail4" placeholder="Email" required="true">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="Password" required="true">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Roll Number</label>
      <input type="Number" name="roll" class="form-control" id="inputEmail4" placeholder="Email" required="true">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Student id</label>
      <input type="Number" name="sid" class="form-control" id="inputPassword4" placeholder="Password" required="true">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Password</label>
      <input type="password" name="pass" class="form-control" id="pass" placeholder="Email" required="true">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm password</label>
      <input type="password" onblur="check()" name="cpass" class="form-control" id="cpass" placeholder="Password" required="true">
    </div>
  </div>


  <div class="form-row">
    
    <div class="form-group col-md-4">
      <label for="inputState">Branch</label>
      <select id="inputState" name="branch" class="form-control">
          <option value="cs/it" selected>CSE/IT</option>
        <option value="ece">ECE</option>
        <option value="en">EN</option>
        <option value="me">ME</option>
        <option value="civil">Civil</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
        <input  class="form-check-input" name="tandc" type="checkbox"   id="gridCheck" onblur='acc()'>
      <label class="form-check-label" for="gridCheck">
        Accept Terms and Condition
      </label>
    </div>
  </div>
           <button type="submit" id="reg" name="register" class="btn btn-primary" disabled="true">Sign in</button>
</form>
</div>
</div>
     </div>
<div class="footer">
  <p>This Community Website is only for the purpose of breaking the boundaries between all the students and faculty.</p>
  <h4>Contact Us:</h4>
  
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	

	<script type="text/javascript" src="group.js?v=<?php echo time();?>">
        
    </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>

</html>
