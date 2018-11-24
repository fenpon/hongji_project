<?php
	/*fix.php*/
	include "../db_conn.php";
	function query_go($ord,$l)
	{
		if (mysqli_query($l,$ord)) {
										    echo "update successfully";
										} else {
										    echo "Error: " . $ord . "<br>" . mysqli_error($l);
										}
	}
	function img_update($link,$unlink,$ind,$l,$uid)
	{
		unlink("../".$unlink."");
		$name = $link['name'];
			$tmp = $link['tmp_name'];
		$uploaddir = '../uploads/';
				$uploadfile = $uploaddir . basename($name);
				$this_is = $tmp;
				$that_is = $name;
				if (move_uploaded_file($this_is, $uploadfile)) {
				    echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
				    $imp = explode(".", $that_is);
				    $imp = array_reverse($imp);
				    $time = "".date("yndGis")."_".$ind."";
				    $up_rename = $time.".".$imp[0]."";
				    $add_value = "'uploads/".$up_rename."'";
				    rename($uploaddir.$that_is, $uploaddir.$up_rename);
				} 
				else {
				    print "파일 업로드 공격의 가능성이 있습니다!\n";
				}
				$col = "link".$ind."";
				$query_ord = "UPDATE board SET $col = $add_value WHERE uid=$uid";
				
				 query_go($query_ord ,$l);
	}
	if(isset($_POST['uid']))
	{$uid = $_POST['uid'];
		if(isset($_POST['type']))
		{
			$type = $_POST['type'];
			if($type == 2)
			{
				//video
				if(isset($_POST['title']))
				{
				$title = iconv('utf-8', 'utf-8',$_POST['title']);


					$query_ord = "UPDATE board
					SET title='$title'
					WHERE uid=$uid";
					query_go($query_ord,$l);
				}
				if(isset($_POST['content']))
				{
					$content  = iconv('utf-8', 'utf-8',$_POST['content']);
					
					$query_ord = "UPDATE board
					SET content='$content'
					WHERE uid=$uid";
					query_go($query_ord,$l);
				}
				if(isset($_POST['video']))
				{
					$vid = $_POST['video'];
					$query_ord = "UPDATE board
					SET link2='$vid'
					WHERE uid=$uid";
					query_go($query_ord,$l);
				}
				if(isset($_FILES['link0']))
				{
					if(isset($_POST['link0_old']))
					{
						img_update($_FILES['link0'],$_POST['link0_old'],0,$l,$uid);
					}
				}
			}
			else
			{
				//other
				if(isset($_POST['title']))
				{$title = $_POST['title'];
					$query_ord = "UPDATE board
					SET title='$title'
					WHERE uid=$uid";
					query_go($query_ord,$l);
				}
				if(isset($_POST['content']))
				{
					$content = $_POST['content'];
					$query_ord = "UPDATE board
					SET content='$content'
					WHERE uid=$uid";
					query_go($query_ord,$l);
				}
				if(isset($_FILES['link0']))
				{
					if(isset($_POST['link0_old']))
					{
						img_update($_FILES['link0'],$_POST['link0_old'],0,$l,$uid);
					}
				}
				if(isset($_FILES['link1']))
				{
					if(isset($_POST['link1_old']))
					{
						img_update($_FILES['link1'],$_POST['link1_old'],2,$l,$uid);
					}
				}
				if(isset($_FILES['link2']))
				{
					if(isset($_POST['link2_old']))
					{
						img_update($_FILES['link2'],$_POST['link2_old'],3,$l,$uid);
					}
				}
				if(isset($_FILES['link3']))
				{
					if(isset($_POST['link3_old']))
					{
						img_update($_FILES['link3'],$_POST['link3_old'],4,$l,$uid);
					}
				}
				if(isset($_FILES['link4']))
				{
					if(isset($_POST['link4_old']))
					{
						img_update($_FILES['link4'],$_POST['link4_old'],5,$l,$uid);
					}
				}
				if(isset($_FILES['link5']))
				{
					if(isset($_POST['link5_old']))
					{
						img_update($_FILES['link5'],$_POST['link5_old'],6,$l,$uid);
					}
				}
				if(isset($_FILES['link6']))
				{
					if(isset($_POST['link6_old']))
					{
						img_update($_FILES['link6'],$_POST['link6_old'],7,$l,$uid);
					}
				}
				if(isset($_FILES['link7']))
				{
					if(isset($_POST['link7_old']))
					{
						img_update($_FILES['link7'],$_POST['link7_old'],8,$l,$uid);
					}
				}
				if(isset($_FILES['link8']))
				{
					if(isset($_POST['link8_old']))
					{
						img_update($_FILES['link8'],$_POST['link8_old'],9,$l,$uid);
					}
				}
				if(isset($_FILES['link9']))
				{
					if(isset($_POST['link9_old']))
					{
						img_update($_FILES['link9'],$_POST['link9_old'],10,$l,$uid);
					}
				}

			}

		}
	}
?>
<script type="text/javascript">
location.href = "http://hongjihyun.com"; 
</script>