<?php
include 'db.php';
session_start();
    $post_no=$_GET['post_no'];
    $link=  mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    $result=  mysqli_query($link, "select user.name,comment.cmnt from comment join user on user.email=comment.email where comment.post_no='$post_no' order by comment.cmnt_no desc");
    while($row=  mysqli_fetch_array($result))
    {
    echo "<p><b>$row[0]</b>$row[1]</p>";
    }
    mysqli_close($link);
?>