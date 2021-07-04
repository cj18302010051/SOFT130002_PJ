<?php


header("Content-type: text/html; charset=utf-8");

$conn=@mysqli_connect("127.0.0.1","root","root") or die("数据库操作失败".mysqli_error());
mysqli_select_db($conn, "make_20210703_assignment") or die("数据库操作失败".mysqli_error());
mysqli_query($conn, 'set names utf8');