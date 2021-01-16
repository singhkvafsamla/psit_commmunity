<?php
include 'db.php';
session_start();
$cmnt=$_GET['cmnt'];
    $post_no=$_GET['post_no'];
    $email=$_GET["email"];
    $link=  mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    mysqli_query($link, "insert into comment(post_no,cmnt,email) values('$post_no','$cmnt','$email')");
    $result=  mysqli_query($link, "select user.name from comment join user on user.email=comment.email where comment.post_no='$post_no' order by comment.cmnt_no desc");
    $row=  mysqli_fetch_array($result);
    echo "<p><b>$row[0]</b>$cmnt</p>";
    mysqli_close($link);
?>