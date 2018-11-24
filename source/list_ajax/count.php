
<?php
/*count.php*/
 include "../db_conn.php";
 
 if(isset($_POST['type']))
 {
	$type_set = $_POST['type'];
	$sql ="";
	$dat = null;
	switch($type_set)
	{
		case 'home':
			$sql = "SELECT uid FROM board ";
			# code...
			break;
		case 'ill':
			$sql = "SELECT uid FROM board where type=3";
			# code...
			break;
		case 'work':
			$sql = "SELECT uid FROM board where not type=3";
			# code...
			break;
	}
	if($res = mysqli_query($l,$sql))
					{
						 
						$row =mysqli_num_rows($res);
					
						$dat = $row;
						$dat = $dat/6;
						$dat = ceil($dat)-1;
					}
					else{
						$dat="fail";
					}	

		echo $dat;	
}
					
			
?>