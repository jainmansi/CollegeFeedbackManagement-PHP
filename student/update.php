<?php
		session_start();
		ob_start();
		require('../connect.php');
		
				$facultyname = $_POST['facultyname'];
				$course = $_POST['course'];
				$audible = $_POST['audible'];
				$doubts = $_POST['doubts'];
				$knowledge = $_POST['knowledge'];
				$suggestions = $_POST['suggestions'];
				
				//echo $facultyname.$course.$audible.$doubts.$knowledge;
				//die();
				
				$str1 = "INSERT INTO teacherfeeds VALUES('','$facultyname', $course, $audible, $doubts, $knowledge, '$suggestions' ) ";
				$res1 = mysqli_query($con, $str1);
				
			
		header("location:index.php");
		
ob_flush();

?>