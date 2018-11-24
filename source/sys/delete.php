<?php
	/*delete.php*/
	if(isset($_GET['uid']))
	{
		$uid = $_GET['uid'];
		if(isset($_GET['type']))
		{
			$type = $_GET['type'];
			include "../db_conn.php";
			if($type != 2)
			{
				$query_ord = 'SELECT * FROM board where uid='.$uid.'';
				$lis = new stdClass();
									if($result = mysqli_query($l,$query_ord,MYSQLI_USE_RESULT))
									{
										
										
										while($row = mysqli_fetch_object($result))
										{
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
									if($lis->link0 != "")
									{
										unlink("../".$lis->link0."");
									}
									if($lis->link1 != "")
									{
										unlink("../".$lis->link1."");
									}
									if($lis->link2 != "")
									{
										unlink("../".$lis->link2."");
									}
									if($lis->link3 != "")
									{
										unlink("../".$lis->link3."");
									}
									if($lis->link4 != "")
									{
										unlink("../".$lis->link4."");
									}
									if($lis->link5 != "")
									{
										unlink("../".$lis->link5."");
									}
									if($lis->link6 != "")
									{
										unlink("../".$lis->link6."");
									}
									if($lis->link7 != "")
									{
										unlink("../".$lis->link7."");
									}
									if($lis->link8 != "")
									{
										unlink("../".$lis->link8."");
									}
									if($lis->link9 != "")
									{
										unlink("../".$lis->link9."");
									}
									$query_ord = "DELETE FROM board where uid = $uid";
									if (mysqli_query($l,$query_ord)) {
										    echo "delete successfully";
										} else {
										    echo "Error: " . $query_ord . "<br>" . mysqli_error($l);
										}
						}
						else
						{
							//비디오 삭제
								$query_ord = "DELETE FROM board where uid = $uid";
									if (mysqli_query($l,$query_ord)) {
										    echo "delete successfully";
										} else {
										    echo "Error: " . $query_ord . "<br>" . mysqli_error($l);
										}
						}

		}

			
	}
?>
<script type="text/javascript">
location.href = "http://hongjihyun.com"; 
</script>
