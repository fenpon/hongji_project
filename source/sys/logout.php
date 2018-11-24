<?php
/*logout.php*/
session_start();
 unset ($_SESSION['id']);
 unset ($_SESSION['pass']);
 echo '<script type="text/javascript">location.href="http://hongjihyun.com/"</script>';
?>
