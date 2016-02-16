<?php
session_start();
//echo $_SESSION['username'].$_SESSION['usertype'];die();

if(isset($_SESSION['username']) && isset($_SESSION['usertype']) && ($_SESSION['usertype']=='student'))
{
}
else
{
	header('location:../index.php');
}

?>

<!DOCTYPE html>

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
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"><!-- Latest compiled and minified JavaScript -->
	<link rel="stylesheet" href="style.css" />
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
  background-color: #4ac2aa;
  background-size: cover;
}
</style>

</head>
<body>
    <!-- Fixed navbar -->

    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #32526e;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="/" style="color:#4ac2aa">MIS Feedback</a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../index.html" style="color:#4ac2aa"><i class="fa fa-home fa-lg"></i>&nbsp;Home</a></li>

                    <li><a href="#about" style="color:#4ac2aa"><i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;Give Feedback</a></li>

                    <li><a href="#contact" style="color:#4ac2aa"><i class="fa fa-group"></i>&nbsp;Our Team</a></li>

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
                    <li><a href="../logout.php">Logout</a></li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container" style="background-color: #4ac2aa">
        <!-- Main component for a primary marketing message or call to action -->

        <div class="jumbotron" style="">
            <h2 style="text-align : center">Your Achievements</h2>
			
			<table>
            
				            
				<?php
					include_once('../connect.php');
										$rollno = $_SESSION['rollno'];
				
					$str1 = "SELECT * FROM achievement WHERE $rollno = rollno";
					$res1 = mysqli_query($con, $str1);
					
					while($row = mysqli_fetch_array($res1))
										{
											$achievement = $row['achievement'];
											echo "<tr><td><p style = 'font-size:18px'>$achievement</p></td></tr>";
										}
					
				
				?>
				
			</table>
							<p style = "text-align : center">	<a href="index.php" >Back</a> </p>
            
        </div>
        </form>
    </div><!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js" type="text/javascript">
</script><script src="js/bootstrap.min.js" type="text/javascript">
</script>
</body>
</html>


