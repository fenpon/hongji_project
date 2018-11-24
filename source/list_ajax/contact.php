<?php
/*contact.php*/
include "../db_conn.php";
	$query_ord = 'SELECT * FROM profil';
					if($result = mysqli_query($l,$query_ord,MYSQLI_USE_RESULT))
					{
						$arr = array();
						$arr = null;
						
						while($row = mysqli_fetch_object($result))
						{
							
								$lis = new stdClass();
								
								$lis->profil1 = iconv("UTF-8", "UTF-8",$row->profil1);
								$lis->profil2  = iconv("UTF-8", "UTF-8",$row->profil2);
								$lis->profil3 = iconv("UTF-8", "UTF-8",$row->profil3);
								$lis->profil4  = iconv("UTF-8", "UTF-8",$row->profil4);
								$arr[] = $lis;
								unset($lis);
							
							
						}
					}else{
						$arr = array(0 => 'empty');
					}
			echo json_encode($arr);
?>