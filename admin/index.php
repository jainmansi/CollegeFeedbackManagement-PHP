<?php
session_start();
//echo $_SESSION['username'].$_SESSION['usertype'];die();

if(isset($_SESSION['username']) && isset($_SESSION['usertype']) && ($_SESSION['usertype']=='administrator'))
{
}
else
{
	header('location:../index.php');
}

?>
<html>


<body>
<p>
Hello!

Welcome ADMIN..!!
</p>
</body>

</html>