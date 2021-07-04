<?php

require("conn.php");

@session_start();

if(empty($_SESSION['uid'])) {
	die("<script>alert('请登录'); window.location='login.php';</script>");
}

$uid = $_SESSION['uid'];

$res = mysqli_query($conn, "select a.cartID as cartID,b.artworkID as artworkID,b.timeReleased as timeReleased,b.title as title,b.artist as artist,b.description as description from carts as a left join artworks as b on a.artworkID=b.artworkID where a.userID=$uid");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="./css/style.css" type="text/css" />
</head>
<body>
	
	<?php require("head.php"); ?>
	
	<div class="result">
		<div class="inner">
			<h1 style="margin: 30px 0; text-align: center; color: #fff;">
				我的收藏
			</h1>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 200px;">名称</td>
					<td style="width: 200px;">作者</td>
					<td>简要介绍</td>
					<td>上传日期</td>
					<td style="width: 100px;">操作</td>
				</tr>
				<?php
					while($row = mysqli_fetch_assoc($res)):
				?>
				<tr id="tr1">
					<td>
						<a href="view.php?id=<?php echo $row['artworkID']; ?>" style="text-decoration: none; color: #fff;">
							<?php echo $row['title']; ?>
						</a>
					</td>
					<td>
						<?php echo $row['artist']; ?>
					</td>
					<td>
						<?php echo mb_substr($row['description'], 0, 100, 'utf-8'); ?>...
					</td>
					<td>
						<?php echo $row['timeReleased']; ?>
					</td>
					<td>
						<a href="./cancel.php?id=<?php echo $row['cartID']; ?>">
							<button>取消收藏</button>
						</a>
					</td>
				</tr>
				<?php
					endWhile;
				?>
				
			</table>
		</div>
	</div>
	
	<div class="footer">
		Copyright © 2021
	</div>

</body>

</html>