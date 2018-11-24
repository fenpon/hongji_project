
<?php
/*home_ajax.php*/
	include "../db_conn.php";
	  $now_page_fir = ($_POST['page']) * 6;
	 $now_page_last = 6;
	$query_ord = 'SELECT * FROM board where NOT type=3 ORDER BY `uid` DESC LIMIT '.$now_page_fir.','.$now_page_last.'';
					if($result = mysqli_query($l,$query_ord,MYSQLI_USE_RESULT))
					{
						$arr = array();
						$arr = null;
						
						while($row = mysqli_fetch_object($result))
						{
							
								$lis = new stdClass();
								$lis->uid = $row->uid;
								$lis->title  = iconv("UTF-8", "UTF-8",$row->title);
								$lis->content  = iconv("UTF-8", "UTF-8",$row->content);
								
									
									$lis->link0  = $row->link0;	
									$lis->link2 = $row->link2;
									
									$lis->type = $row->type;
								
								
								$arr[] = $lis;
								unset($lis);
							
							
						}
					}else{
						$arr = array(0 => 'empty');
					}
			echo json_encode($arr);
?>