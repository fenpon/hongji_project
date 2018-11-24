<?php
/*user.php*/

?>
<div id="it_user_ui">
	<div id="menu_clk_1" class="font">x</div>
	<a href="../sys/upload.php"><div id='upload' class="font">upload</div></a>
	<?php 
		if($page_type == 1)
		{//디테일
			echo "<div id='modify' class='font'>modify</div>";
			echo "<div id='confirm' class='font'>Confirm</div>";
			echo "<div id='cancel' class='font'>Cancel</div>";
			echo "<a href='../sys/delete.php?uid=".$uid."&type=$type'><div id='delete' class='font'>delete</div></a>";
		}
	?>
	<a href="../sys/logout.php"><div id='logout' class="font">logout</div></a>
</div>
<div id="menu_clk_0"><img src="../icon/rightgo.png" style="width:100%; height:100%;"
id="clk_menu_evt"></div>
<script type="text/javascript" src="../js/user_op.js"></script>
