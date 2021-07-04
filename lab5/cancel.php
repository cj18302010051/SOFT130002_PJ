<?php

require("conn.php");

$id = $_GET['id'];

mysqli_query($conn, "delete from carts where cartID=$id");

die("<script>alert('取消收藏成功'); window.location='collect.php';</script>");