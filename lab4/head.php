<div class="head">
	<a href="">
		<div class="l home">
			<span style="font-size: 25px;">
				Art Store
			</span>
			<span>
				where you find GENIUS 
			</span>
		</div>
	</a>
	<?php
		@session_start();
		if(empty($_SESSION['uid'])):
	?>
	<a href="./register.php"><div class="r nav">注册</div></a>
	<a href="./login.php"><div class="r nav">登录</div></a>
	<?php
		else:
	?>
	<a href="./logout.php"><div class="r nav">退出</div></a>
	<?php
		endif;
	?>
	<a href="./search.php"><div class="r nav">搜索</div></a>
	<a href="./index.php"><div class="r nav">首页</div></a>
</div>