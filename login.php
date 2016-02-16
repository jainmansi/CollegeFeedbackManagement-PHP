<?php
		session_start();
		ob_start();
		include('connect.php');
		if($_POST)
		{
			if(isset($_POST['username']) &&isset($_POST['password']) &&isset($_POST['usertype']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['usertype']))
			{
				$username = mysqli_real_escape_string($con, $_POST['username']);
				$password = mysqli_real_escape_string($con,$_POST['password']);
				$usertype = mysqli_real_escape_string($con,$_POST['usertype']);
				
				//echo $username.$password.$usertype;die();
				
				$str1 = "SELECT * FROM login WHERE username='$username'";
				$res1 = mysqli_query($con, $str1);
				while($row = mysqli_fetch_array($res1))
				{
					//echo $row['username'].$row['password'].$row['usertype'];die();
					/*if($username == $row['username'])
						echo '1';
					if($password ==$row['password'])
						echo '2';
					if($usertype== $row['usertype'])
						echo '3';
					die();*/
					if($username == $row['username'] && $password ==$row['password'] && $usertype== $row['usertype'])
					{
						echo 'Login Successful. Redirecting you!';
						$_SESSION['username'] = $username;
						$_SESSION['usertype'] = $usertype;
						$_SESSION['login'] = '1';
						if($usertype == "student")
						{
							header("location:student/");
						}
						else if($usertype == "faculty")
						{
							header("location:faculty/");
						}
						else if($usertype == "administrator")
						{
							header("location:admin/");
						}
					}
					else
					{
						echo 'Login Failed. Please try again!';
						$_SESSION['login']='0';
						header('location:index.php');
					}
				}
			}
		}
		//echo 'Login Failed. Please try again!';
		//$_SESSION['login']='0';
		//header('location:index.php');
ob_flush();
?>