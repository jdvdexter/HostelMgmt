<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<title>Admin Profile</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>


</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
                                            <br>
						<h2 class="page-title">Admin Profile</h2>
	<?php	
$aid=$_SESSION['id'];
	$ret="select * from admin where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;
	 $res=$stmt->get_result();
	 
	   while($row=$res->fetch_object())
	  {
	  	?>
						<div class="row">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading">Admin profile details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Username </label>
												<div class="col-sm-10">
													<input type="text" value="<?php echo $row->username;?>" disabled class="form-control"><span class="help-block m-b-none">
													Username can't be changed.</span> </div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Email</label>
												<div class="col-sm-10">
	<input type="email" class="form-control" name="emailid" id="emailid" value="<?php echo $row->email;?>" required="required">
						 
												</div>
											</div>



								
											</div>

										</form>

									</div>
								</div>
									<?php }  ?>
								

										</form>

									</div>
								</div>
							</div>
							</div>
						
									
							
						</div>

					</div>
				</div> 	
				

			</div>
		</div>
	</div>
        
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script>
function checkpass() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'oldpassword='+$("#oldpassword").val(),
type: "POST",
success:function(data){
$("#password-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</body>

</html>