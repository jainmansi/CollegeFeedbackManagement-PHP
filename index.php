<!DOCTYPE html>
<?php
		session_start();
		//$_SESSION['login'] == 0;
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
							$_SESSION['rollno'] = $row['rollno'];
							header("location:student/");
						}
						else if($usertype == "faculty")
						{
							header("location:faculty/");
						}
						else if($usertype == "administrator")
						{
							header("location:admin/index.php");
						}
					}
					else
					{
						
						$_SESSION['login']='0';
						
					}
					
						}
					
			}
		}
		//echo 'Login Failed. Please try again!';
		//$_SESSION['login']='0';
		//header('location:index.php');
ob_flush();

?>
<html lang="en">
<head>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feedback System | MIS Project</title><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"><!-- Latest compiled and minified JavaScript -->
	<link rel="stylesheet" href="css/style.css" />
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js" type="text/javascript">
</script>
   <!--  <script src="../../assets/js/ie-emulation-modes-warning.js" type="text/javascript">
    </script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js" type="text/javascript">
    </script> -->

<style>
	body {
  padding-top: 70px;
}
</style>

</head>
<body>
    <!-- Fixed navbar -->

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="/">MIS Feedback</a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><i class="fa fa-home fa-lg"></i>&nbsp;Home</a></li>

                    <li><a href="#about"><i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;Give Feedback</a></li>

                    <li><a href="#contact"><i class="fa fa-group"></i>&nbsp;Our Team</a></li>

                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                    
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                    
                            <li><a href="#">Another action</a></li>
                    
                            <li><a href="#">Something else here</a></li>
                    
                            <li class="dropdown-header">Nav header</li>
                    
                            <li><a href="#">Separated link</a></li>
                    
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                     -->                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../navbar/">Default</a></li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
        <!-- Main component for a primary marketing message or call to action -->

        <div class="jumbotron">
            <h2 style="text-align : center">Login Panel</h2>

			<?php
						//echo $_SESSION['login'];
						//die();
						/*if($_SESSION['login']=='0' && isset($_SESSION['login']))
						{
							echo "<p style='text-align:center; color:red;margin-bottom:0px'>Login Failed!</p>";
							$_SESSION['login']='2';
					}*/
						
	
			?>
			
           <form method="POST" action="#">
           
           		<div class="btn-group group-type">
					  <select name="usertype" class="form-control">
					  			<option value="student" id="student">Student</option>
					  			<option value="faculty" id="faculty">Faculty</option>
					  			<option value="administrator" id="administrator">Administrator</option>
					  </select>
				</div>
	            <div class="input-group group-1" >
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="username" class="form-control" placeholder="Username">
				</div>
				<div class="input-group group-1" >
					<span class="input-group-addon"><i class="fa fa-key"></i></span>
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				
				
								
            <p class="submit-btn"><button class="btn btn-lg btn-primary" role="button" style="width: 100%;" onSubmit=""><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;LOG IN</button></p>
        </div>
        </form>
    </div><!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js" type="text/javascript">
</script><script src="js/bootstrap.min.js" type="text/javascript">
<script>
		$('#student').onclick(function(){
			console.log('Muff!');
		});
</script>
</script>
</body>
</html>


