<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT username,email,password,id FROM admin WHERE (userName=?|| email=?) and password=? ");
				$stmt->bind_param('sss',$username,$username,$password);
				$stmt->execute();
				$stmt -> bind_result($username,$username,$password,$id);
				$rs=$stmt->fetch();
				$_SESSION['id']=$id;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
  
					header("location:admin-profile.php");
				}

				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
			}
				?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
   

	<title>Admin login</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head
<body>
	<div class="login-page bk-img" style=" ">
                <div >
			<div class="container">
				<div >
					<div class="col-md-4 col-md-offset-4">
						<h1 class="text-center text-bold mt-4x">HMS</h1>
						<div class="well row pt-2x pb-3x bk-light" style="background-color:transparent ;">
							<div class="col-md-8 col-md-offset-2">
							
								<form action="" class="mt" method="post">
									<label for="" >Your Username or Email ID</label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">
									<label for="">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									

									<input type="submit" class="btn btn-red btn-dark" name="login" value="login" >
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>