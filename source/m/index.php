<!DOCTYPE html>
<html lang="ko">
	<head>
  		 <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<!-- 부가적인 테마 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/nanumgothic.css">
		
		<style type="text/css">
			
			
			@font-face {
			  font-family: 'hongji_font';
			  font-style: normal;
			  font-weight: 200;
			  src: local('Montserrat ExtraLight'), local('Montserrat-ExtraLight'), url(https://fonts.gstatic.com/s/montserrat/v10/eWRmKHdPNWGn_iFyeEYjaxJVFIDcAmz_xdaO4iposbc.woff2) format('woff2');
			  unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
			}
			/* latin-ext */
			@font-face {
			  font-family: 'hongji_font';
			  font-style: normal;
			  font-weight: 200;
			  src: local('Montserrat ExtraLight'), local('Montserrat-ExtraLight'), url(https://fonts.gstatic.com/s/montserrat/v10/eWRmKHdPNWGn_iFyeEYjawmpp9opcZztmOKdRoeEHCU.woff2) format('woff2');
			  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
			}
			/* latin */
			@font-face {
			  font-family: 'hongji_font';
			  font-style: normal;
			  font-weight: 200;
			  src: local('Montserrat ExtraLight'), local('Montserrat-ExtraLight'), url(https://fonts.gstatic.com/s/montserrat/v10/eWRmKHdPNWGn_iFyeEYja6EWXqnGSfwnQD3YDlprsb0.woff2) format('woff2');
			  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
			}


		</style>
		<link rel="stylesheet" type="text/css" href="./css/m_style.css">
		<script
		  src="http://code.jquery.com/jquery-3.1.1.min.js"
		  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		  crossorigin="anonymous"></script>
		  <script type="text/javascript">
		  	
		  	if(!navigator.userAgent.match(/Mobile|iP(hone|od)|BlackBerry|IEMobile|Kindle|NetFront|Silk-Accelerated|(hpw|web)OS|Fennec|Minimo|Opera M(obi|ini)|Blazer|Dolfin|Dolphin|Skyfire|Zune/)){
  				//태블릿,PC에서만 실행 될 스크립트
  				location.href="http://hongjihyun.com";
			}
			else{
				console.log("스맛폰");
			}
		  </script>
		 <script type="text/javascript">
		 function menu_clk()
		 {
		 						$(".menu_icon").html("<img src='./m_icon/menu_can.png' id='menu_can' onclick='menu_can_clk()' style='width:100%; height:100%;' >");
					 		$("#tag_menu").show();				 	
		 }
		 function menu_can_clk()
		 {
		 			$(".menu_icon").html('<img src="./m_icon/menu.png" id="menu" onclick="menu_clk()" style="width:100%; height:100%;" >');
						 		$("#tag_menu").hide();
		 }
		 
		 	
		 </script>
		 <?php
		 if(isset($_GET['type']))
		 {
		 	$type = $_GET['type'];
		 }
		 else{
		 	//home
		 	$type =0;
		 }
		 echo '<script type="text/javascript">var type = '.$type.';</script>';
		 ?>
		  <event_tag></event_tag>
		 <script type="text/javascript" src="./js/m_paging.js"></script>

  	</head>
  	<body >
  		 
  		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  		<div id="tag_menu" >
  			<div id="menu_text">
  				
  				<table id="menu_table">
  					<tr>
  						<td><span class="font" id="work"><center><a href="./?type=1">Work</a></center></span></td>
  					</tr>
  					<tr>
  						<td><span class="font" id="ill"><center><a href="./?type=3">illust</a></center></span></td>
  					</tr>
  					<tr>
  						<td><span class="font" id="con"><center><a href="./?type=2">Contact</a></center></span></td>
  					</tr>
  				</table>
  			</div>
  		</div>
  		<div class="row" id="main_board" >
	  		<div class="col-xs-12  col-sm-12 col-md-12" >
		  		<div class="affix" id="menu_ohhhhh" style="height:70px;"
			  		<div class="row" style=" height: 100%;">
			  			<div class="col-xs-4  col-sm-4 col-md-4" style="  padding-top: 3px;">
			  			  	<span class="font" style="font-size: 20px; margin-left: 5px;  font-style: bold;">
				  			  	<a id="home" href="./">
				  			  		<img src="../icon/hongji_title.png"  style="width:70px;">
				  			  	</a>
			  			  	</span>
			 			</div>
			 			<div class="col-xs-6  col-sm-6 col-md-6" >	
			 			</div>
			  			<div class="col-xs-2  col-sm-2 col-md-2" >
			  				<div class="menu_icon" style="width:30px; height:40px;"><img src="./m_icon/menu.png" id="menu"  onclick="menu_clk()" style="width:100%; height:100%;" ></div>
			  			</div>
			  		</div>
		  		</div>
		  	</div>
		  	<div class="col-xs-12  col-sm-12 col-md-12" id="img_tag" >
		  		<div class="row" id="img_plus" ></div>
		  	</div>
		  	<div class="col-xs-12  col-sm-12 col-md-12" id="contact" align="center"></div>
	  	</div>
  	</body>
</html>