<!DOCTYPE html>
<?php
include 'db.php';
session_start();
if(!isset($_SESSION[$_COOKIE['group']]))
{
    if(isset($_COOKIE['group']))
    {
        setcookie("group","",time()-3600,'/');
        setcookie("name","",time()-3600,"/");
    }
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantamaran">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
  

	
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
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home" style="font-size:20px;color:red"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="eventwall.html"><i class="fa fa-tasks" style="font-size:15px;color:red"></i> Event Wall</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fa fa-user-plus" style="font-size:20px;color:red"></i> Join Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="logout.php"><i class="fa fa-sign-in" aria-hidden="true" style="font-size: 20px;color: red"></i> Log Out</a>
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


<div class="mid">
    <div class="row">
        <div class="column1" style="background-color:lemonchiffon" >
            <h2 style="color: crimson">VISION</h2>
            <ul><li>
            <h5 class="hstyle">To achieve excellence in professional education and create an ecosystem for the holistic development of all stakeholders</h5>

            </li></ul>
            <h2 style="color: crimson">MISSION</h2>
            <ul><li>
            <h5>To provide an environment of effective learning and innovation transforming students into dynamic, responsible and productive professionals in their respective fields, who are capable of adapting to the changing needs of the industry and society.</h5>

            </li></ul>
            <img class="pp" src="../images/psit-image.png" alt="" >
            
    </div>
  
  <div class="column2" style="background-color:burlywood">
    <h2 style="color: crimson">DEPARTMENTS</h2>
    <div class="boxmodel">
       
           <div class="mid-right">
            <div class="mid-right-top">
    
        <ul class="right-nav">
          
      <li><a href="cse.php">CSE/IT</a></li>
      <li><a href="ece.php">ECE</a></li>
      <li><a href="en.php">EN</a></li>
      <li><a href="me.php">ME</a></li>
      
        </ul>
        </div>
       </div>
    </div>
    
    
</div>
</div>

<div class="footer">
  <p>This Community Website is only for the purpose of breaking the boundaries between all the students and faculty.</p>
  <h4>Contact Us:</h4>
  
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	

	<script>
        
	</script>

</body>

</html>
