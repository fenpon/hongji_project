
<?php
/*login.php*/
session_start();
if(isset($_POST["id"]))
{
	if(isset($_POST["pass"]))
	{
		$data_id =null;
		$data_pass = null;
		include "../db_conn.php";
		$sql = "SELECT * FROM login";
		if($res = mysqli_query($l,$sql))
		{
			$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
			$data_id = $row["id"];
			$data_pass = $row["pass"];
		}
		else
		{
			echo "alert('database_error');";
		}	

		$id = $_POST["id"];
		$pass = $_POST["pass"];
		if($data_id == $id)
		{
			if($data_pass == $pass)
			{
				$_SESSION["id"] = $data_id;
				$_SESSION["pass"] = $data_pass;
				echo "alert('부타 부타링 로그인 됬꿀 ');";
			}
			else
			{
				echo "alert('비번틀림');";
			}
		}
		else
		{
			echo "alert('아디 틀림');";
		}
	}
	else
	{
		echo "alert('비번 내놔.');";
	}
}
else
{
	echo "alert('아이디 내놔.');";
}
echo '<script type="text/javascript">location.href = "../";</script>';
?>


	
