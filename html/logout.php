<?php
            session_start();
session_destroy();
setcookie("group","",time()-3600,"/");
setcookie("name","",time()-3600,"/");

header("location:index.php");
        ?>