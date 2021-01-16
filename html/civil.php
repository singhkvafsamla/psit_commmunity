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
if(isset($_GET['sendquery']))
{
    $email=$_SESSION[$_COOKIE['group']];
    $query=$_GET['postquery'];
    $link=  mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    mysqli_query($link, "insert into posts(email,data,branch) values('$email','$query','civil')");
    mysqli_close($link);
}
if(isset($_GET['comment']))
{
    $cmnt=$_GET['postquery'];
    $post_no=$_GET['comment'];
    $email=$_SESSION[$_COOKIE['group']];
    $link=  mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    mysqli_query($link, "insert into comment(post_no,cmnt,email) values('$post_no','$cmnt','$email')");
    if(mysqli_affected_rows($link)>0)
    {
        echo"ho gaya";
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
	
	<link rel="stylesheet" href="../css/cse.css" class="css">

	<title>PSIT Community</title>

	<!--  -->

	<style>
* {
  box-sizing: border-box;
}

.row {
  display: flex;
 
}

/* Create two equal columns that sits next to each other */
.column1 {
    
     
  flex: 50%;

  padding: 10px;
  height: 500px; /* Should be removed. Only for demonstration */
}
.column2 {
         
  flex: 50%;

  padding: 10px;
  height: 500px; /* Should be removed. Only for demonstration */
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
<div class="image">
    <img src="../images/cse.jpg" alt="cse image">
</div>

<div class="wrapper">
    <div class="post-query">
        <h2>New Query Post below.</h2>
    </div>
       <div class="text-area">
           <form>
           <textarea id="query" name="postquery" rows="4" cols="50"></textarea>
          <br>
          <button id="query" type="submit" name="sendquery" class="btn btn-primary">Post !!</button> 
           </form>
       </div>
    <hr>
       <h3>Posted Query Below</h3>
       <!--<hr>
       <div class="student-query">
           <h3>Name</h3>
           <p>Posted Query Here.</p>
           <p>Comment Below!!</p>
       <form method="get">
            <textarea id="query1" name="postquery" rows="2" cols="30"></textarea>
            <br>
            <button type="button" class="btn btn-primary">Comment</button>
       </form>
       </div>
        select a.cmnt as comment,b.data,c.name,(select user.name from comment join user on user.email=comment.email where a.cmnt_no=comment.cmnt_no) from comment as a join posts as b on a.post_no=b.post_no join user as c on b.email=c.email group by b.post_no order by b.post_no desc,a.cmnt_no desc;-->
       <?php
       $link= mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
       $result=mysqli_query($link, "select a.cmnt as comment,b.data,c.name,(select user.name from comment join user on user.email=comment.email where a.cmnt_no=comment.cmnt_no) as comment_name,a.post_no from (select * from comment order by cmnt_no desc) as a right join posts as b on a.post_no=b.post_no join user as c on b.email=c.email where b.branch='civil' group by b.post_no order by b.post_no desc;;");
       $i=0;
       while ($row=mysqli_fetch_array($result))
           {
               
               echo '<div class="student-query">
           <h4>'.$row[2].'</h4>
           <h5>Ques.>>'.$row[1].'</h5>
                <div  id="cmnt'.$i.'" style="z-index:4;" onclick="all_comment('.$row[4].',\'cmnt'.$i.'\')">
                    <p><b>'.$row[3].'</b>  '.$row[0].'</p>
                </div>
            <textarea id="query1" name="postquery" rows="" cols="30"></textarea>
            <br>
            <button id="query2" type="submit" name="comment" value="'.$_SESSION[$_COOKIE["group"]].'" onclick="comment('.$row[4].',\'cmnt'.$i.'\')" class="btn btn-primary">Comment</button></div>';
            $i++;
               
           }
       ?>
</div>
        



  



<div class="footer">
  <p>This Community Website is only for the purpose of breaking the boundaries between all the students and faculty.</p>
  <h4>Contact Us:</h4>
  <ul>
      
  </ul>
</div>




	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	

        <script type="text/javascript" src="group.js?v=<?php echo time();?>">
        
    </script>

</body>

</html>
