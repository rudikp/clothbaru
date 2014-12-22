<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="cloth";
    $konek=mysql_connect($host,$user,$password) or die (mysql_error());
    mysql_select_db($db,$konek) or die (mysql_error());
?>