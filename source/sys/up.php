<?php
/*up.php*/
include "../db_conn.php";
mysqli_set_charset($l,"utf8");
$title = htmlspecialchars($title);
$content = htmlspecialchars($content);
$title = iconv('utf-8', 'utf-8',$_POST['title']);
$content = iconv('utf-8', 'utf-8',$_POST['content']);

$type = $_POST['type'];
if($type != 2)
{
		$add_value = "'$title','$content'";
		$this_tag = "title,content";
		if(isset($_FILES['file']))
		{
			$name = $_FILES['file']['name'];
			$tmp = $_FILES['file']['tmp_name'];

			for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
				# code...
				
				$uploaddir = '../uploads/';
				$uploadfile = $uploaddir . basename($name[''.$i.'']);
				$this_is = $tmp[''.$i.''];
				$that_is = $name[''.$i.''];
				if (move_uploaded_file($this_is, $uploadfile)) {
				    echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
				    $imp = explode(".", $that_is);
				    $imp = array_reverse($imp);
				    $time = "".date("yndGis")."_".$i."";
				    $up_rename = $time.".".$imp[0]."";
				   
				    $tag = "";
				    if($i == 0)
				    {
				    	$tag = "link0";
				    }
				    else{$tag = "link".($i + 1)."";}
				    $this_tag .= ",".$tag."";
				    $add_value .= ",'uploads/".$up_rename."'";
				    rename($uploaddir.$that_is, $uploaddir.$up_rename);
				} 
				else {
				    print "파일 업로드 공격의 가능성이 있습니다!\n";
				}
			}

			$this_tag .= ",type";
				$add_value  .= ",$type";
				echo "<br>value:";
				echo $this_tag;
				echo "<br>value2:";
				echo $add_value ;
				echo "<br>";
			$query_ord = "INSERT INTO board ($this_tag) VALUES ($add_value)";
			if (mysqli_query($l,$query_ord)) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $query_ord . "<br>" . mysqli_error($l);
				}

			}
}
else
{
	//비디오 업로드
	$video = $_POST['video'];
	$query_ord = "INSERT INTO board (title,content,link2,type) VALUES ('$title','$content','$video',$type)";
			if (mysqli_query($l,$query_ord)) 
			{
				    echo "New record created successfully";
			} 
			else 
			{
				    echo "Error: " . $query_ord . "<br>" . mysqli_error($l);
			}

			
}


?>
<script type="text/javascript">
location.href = "http://hongjihyun.com"; 
</script>