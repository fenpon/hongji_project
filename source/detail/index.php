
<?php
/*/detail/index.php*/
session_start();

$uid = $_GET['uid'];
$type= $_GET['type'];
include "../db_conn.php";
$query_ord = 'SELECT * FROM board where uid='.$uid.'';
$lis = new stdClass();
					if($result = mysqli_query($l,$query_ord,MYSQLI_USE_RESULT))
					{
						
						
						while($row = mysqli_fetch_object($result))
						{
							
								
								
								$lis->title = iconv("UTF-8", "UTF-8",$row->title);
								$lis->content  = iconv("UTF-8", "UTF-8",$row->content);
								$lis->link0 = iconv("UTF-8", "UTF-8",$row->link0);
								$lis->link1  = iconv("UTF-8", "UTF-8",$row->link2);
								$lis->link2 = iconv("UTF-8", "UTF-8",$row->link3);
								$lis->link3 = iconv("UTF-8", "UTF-8",$row->link4);
								$lis->link4 = iconv("UTF-8", "UTF-8",$row->link5);
								$lis->link5 = iconv("UTF-8", "UTF-8",$row->link6);
								$lis->link6 = iconv("UTF-8", "UTF-8",$row->link7);
								$lis->link7 = iconv("UTF-8", "UTF-8",$row->link8);
								$lis->link8 = iconv("UTF-8", "UTF-8",$row->link9);
								$lis->link9 = iconv("UTF-8", "UTF-8",$row->link10);

						}
					}
					else{
						//error
						echo "<script>console.log('error_internet');</script>";
					}
			echo '<script type="text/javascript">var type_t = '.$type.'; var uid_this = '.$uid.';</script>';
			
?>
<script type="text/javascript">
		
		if(!navigator.userAgent.match(/Mobile|iP(hone|od)|BlackBerry|IEMobile|Kindle|NetFront|Silk-Accelerated|(hpw|web)OS|Fennec|Minimo|Opera M(obi|ini)|Blazer|Dolfin|Dolphin|Skyfire|Zune/)){
  				//태블릿,PC에서만 실행 될 스크립트
  				console.log("pc or tablet");
			}
			else{
				location.href="../m/detail/?uid=<?=$uid;?>&type=<?=$type;?>";
			}
		
	</script>
	
 <?php $page_type= 1;?>
<!DOCTYPE HTML>
	<head>
	<meta charset="utf-8">
		 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/nanumgothic.css">
		<link rel="stylesheet" type="text/css" href="../css/style_this.css">
		<link rel="stylesheet" type="text/css" href="./css/detail_style.css">
		<link rel="stylesheet" type="text/css" href="../css/user_interface_style.css">
		<script
	  src="http://code.jquery.com/jquery-3.1.1.min.js"
	  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	  crossorigin="anonymous"></script>
	  <script type="text/javascript">var list = eval(<?php echo json_encode($lis);?>);</script>

		<script type="text/javascript" src="./js/detail_set.js"></script>

	</head>
	<body  >
	<div id="view_top"><img src="../icon/scroll.png" style="width: 100%; height: 100%;"></div>
	<?php 
	if(isset($_SESSION['id']))
	{
		if(isset($_SESSION['pass']))
		{
			echo '<div id="fixed_tag" align="center"></div>';
			echo '<div id="user_interface" >';
			 require_once "../user/user.php";
			echo '</div>';
		}
	}
	if($type != 3)
	{
		echo '<script type="text/javascript">
		$(document).ready(function()
		{
					$("#work_menu").css("border-bottom", "black solid 1px");
		});
		</script>';
	
	}
	else{
		echo '<script type="text/javascript">
		$(document).ready(function()
		{
					$("#ill_menu").css("border-bottom", "black solid 1px");
		});
		</script>';
	}
	?>
	<script type="text/javascript" src="../js/user.js"></script>

		<div id="main_this" >
			<div id="main_bar" >
				<div id="menu_container">
					<div id='menu_div' >
						<div id='menu_1' >
												
								<div id='sub_1' align="center">
									<span class='font' id="sub_1_sp" style='font-size:36px; position: relative; height:100%;'>
										<a  href='../#home' id='home_menu' class='paging_but' >
											<img src="../icon/hongji_title.png"  id="img_title">
										</a>
									</span>
								</div>
							
						</div>
						<table id='menu_2'>
							<tr>
								<td id='sub_2'>	
									
										<span class='font' id="sub_2_sp"  style='font-size:16px; '>
											<a  href='../#work'' id='work_menu' class='paging_but'>
												work
											</a>
										</span>
									
								</td>

									<td id='sub_3'>
									
										<span class='font'  id="sub_3_sp"  style='font-size:16px;'>
											<a  href='../#ill' id='ill_menu' class='paging_but'>
												illust
											</a>
										</span>
								
									</td>

									<td id='sub_4'>	
									
										<span class='font' id="sub_4_sp"  style='font-size:16px;'>
												<a  href='../#con' id='con_menu' class='paging_but' >
													Contact
												</a>
										</span>	
								
									</td>
							</tr>
						</table>
					</div>
				</div>
				<div id='v_view'>
					
					<div id="viewer" align="center" >
							<div id="text_this">
								<div id="tag_title"  class="font" >
																<?php  if($lis->title != ""){echo $lis->title; }?>
								</div>
							</div>
							<div id="img_de"   >
							<?php  if($lis->link0 != ""){echo '<img src="../'.$lis->link0.'" class="img_link0" id="img_ss" >'; }?>
							</div>
							<div id="img_de"  >
							<?php 
							
							if($type == 2)
							{$video_id = str_replace("https://vimeo.com/","",$lis->link1);
								echo '<iframe id="video_tag" src="https://player.vimeo.com/video/'.$video_id.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
								echo '<div  id="video_chaner" ></div>';
							}
							else
							{ 
									if($lis->link1 != ""){echo '<img src="../'.$lis->link1.'"  id="img_ss" class="img_link1" >';}
							} ?>
							</div>
							<div id="img_de" >
							<?php if($lis->link2 != ""){ echo '<img src="../'.$lis->link2.'" class="img_link2" id="img_ss" >'; }?>
							</div>
							
							<div id="img_de"  >
							<?php  if($lis->link3 != ""){echo '<img src="../'.$lis->link3.'"  class="img_link3" id="img_ss" >';} ?>
							</div>
							
							<div id="img_de" >
							<?php  if($lis->link4 != ""){echo '<img src="../'.$lis->link4.'"  class="img_link4" id="img_ss">';} ?>
							</div>
							<div id="img_de"  >
							<?php if($lis->link5 != ""){ echo '<img src="../'.$lis->link5.'" class="img_link5" id="img_ss">'; } ?>
							</div>
							<div id="img_de"  >
							<?php if($lis->link6 != ""){ echo '<img src="../'.$lis->link6.'"  class="img_link6" id="img_ss">'; }?>
							</div>
							<div id="img_de"  >
							<?php if($lis->link7 != ""){ echo '<img src="../'.$lis->link7.'" class="img_link7" id="img_ss">';} ?>
							</div>
							<div id="img_de" >
							<?php if($lis->link8 != ""){ echo '<img src="../'.$lis->link8.'" class="img_link8" id="img_ss">';} ?>
							</div>
							<div id="img_de"  >
							<?php if($lis->link9 != ""){ echo '<img src="../'.$lis->link9.'"  class="img_link9" id="img_ss">';} ?>
							</div>
							
							
					</div>
					<table  style="position:relative; width:100%; margin-top:50px;" >
						<tr>
						<td style ="width:33.333%"></td>
						
						<td style ="width:33.333%" id="content_tag" class="font">
									<?php if($lis->content != ""){ echo nl2br($lis->content);} ?> 
						</td>
						
						<td style ="width:33.333%"></td>
						</tr>
					</table>
				</div>
			</div>
				
		</div>
	</div>
	
	</body>
	<?php 
		unset($lis);
	?>
</html>