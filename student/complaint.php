<?php
session_start();
		ob_start();
		require('../connect.php');
		
				$complaint = $_POST['complaint'];
				$rollno = $_SESSION['rollno'];
				
				//echo $facultyname.$course.$audible.$doubts.$knowledge;
				//die();
				
				$str1 = "INSERT INTO complaint VALUES('',$rollno, '$complaint') ";
				$res1 = mysqli_query($con, $str1);
				
			
		header("location:index.php");
		
ob_flush();

?>