<!DOCTYPE HTML>




	<head>
	<meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/nanumgothic.css">
	<link rel="stylesheet" type="text/css" href="./css/style_this.css">
	<link rel="stylesheet" type="text/css" href="./css/user_interface_style.css">
	<script
	  src="http://code.jquery.com/jquery-3.1.1.min.js"
	  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	  crossorigin="anonymous"></script>
	  <script type="text/javascript">
		
		 
		if(!navigator.userAgent.match(/Mobile|iP(hone|od)|BlackBerry|IEMobile|Kindle|NetFront|Silk-Accelerated|(hpw|web)OS|Fennec|Minimo|Opera M(obi|ini)|Blazer|Dolfin|Dolphin|Skyfire|Zune/)){
  				//태블릿,PC에서만 실행 될 스크립트
  				console.log("pc or tablet");
			}
			else{
				location.href="./m";
			}
		
	</script>


	  <script type="text/javascript">
	  	var json = new Object();
	  	var old_json = {'ty':null,'p':null};
	  	var break_point = true;
	  	var type_t = null;
	  </script>
	  <?php session_start();?>
	  <?php $page_type= 0;?>
	<event_tag></event_tag>
	
	<script type="text/javascript" src="./js/paging_default_op.js"></script>

	</head>


	<body>
	<div id="view_top"><img src="../icon/scroll.png" style="width: 100%; height: 100%;"></div>
		<?php 
		if(isset($_SESSION['id']))
		{
			if(isset($_SESSION['pass']))
			{
				echo '<div id="user_interface" >';
				 require_once "./user/user.php";
				echo '</div>';
			}
		}
		
		?>
		<script type="text/javascript" src="./js/user.js"></script>
		<div id="main_this">
			
				<?php  require_once "./templet.php";?>
		</div>	
			<script type="text/javascript" src="./js/list_board.js"></script>
		<script type="text/javascript" src="./js/list.js"></script>
		<!--여기가 메인 디자인 창-->
		
		
	</body>
</HTML>
