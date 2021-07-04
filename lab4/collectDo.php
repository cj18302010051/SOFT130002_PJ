<?php

require("conn.php");

@session_start();

if(empty($_SESSION['uid'])) {
	die("<script>alert('请登录'); window.location='login.php';</script>");
}

$uid = $_SESSION['uid'];

$id = $_GET['id'];

// 查询是否已经收藏
$res = mysqli_query($conn, "select * from carts where userID=$uid and artworkID=$id");
if($row = mysqli_fetch_assoc($res)) {
	die("<script>alert('已收藏，无需重复收藏'); window.location='collect.php';</script>");
}

mysqli_query($conn, "insert into carts(userID, artworkID) values($uid, $id)");

die("<script>alert('收藏成功'); window.location='collect.php';</script>");