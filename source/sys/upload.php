<!DOCTYPE HTML>
	<head>
	<script
		  src="http://code.jquery.com/jquery-3.1.1.min.js"
		  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		  crossorigin="anonymous">
	</script>
	<script type="text/javascript">
	var count = 0;
	console.log("hello");
	$(document).ready(function()
		{
			$("#plus").click(
				function()
				{console.log("set");
					$("#file_inner").append('<div><input type="file" name="file[]" class="target_'+count+'"></div>');
					count++;
				}
			);
			$("#mi").click(
				function()
				{
					$( '.target_'+count+'' ).detach();
					count--;
				}
			);	 
			$(".video").click(
				function()
				{count = 0;
					$("#file_inner").empty();
					$("#uploader").hide();
					$("#file_inner").append('<div><input type="text" name="video"></div>');
				}
			);
			$(".other").click(
				function()
				{count = 0;
					$("#file_inner").empty();
					$("#uploader").show();
				}
			);
		}
	);
	
	</script>
	</head>
	<body>
		<form action="./up.php" method="post" enctype="multipart/form-data">
		<div style="margin-left: 45px;">
		work_type : <input type='radio' name='type' value='1' checked="checked" class = "other">
		work_video : <input type='radio' name='type' value='2' class = "video">
		illust : <input type='radio' name='type' value='3' class = "other">
		</div>
		<table style="margin-left:45px;">
		 <tR><td> title : </td><tD><input type="text" name="title"></tD></tR>
		  <tr><td>content : </td><td><textarea name="content" style="width:300px; height:500px;"></textarea></td></tr>
		  </table>
		  <div id="file_inner" style="margin-left:37px;"></div>
			<table >
			  	<tr id="uploader">
				 <td id="plus" style="width: 75px;"><center>+</center></td>
				 <td id="mi" style="width: 75px;"><center>-</center></td>
				</tr>
			</table>
		  <input type="submit" value="Submit" style="margin-left:45px;">
		</form>
	</body>

</form>
</html>