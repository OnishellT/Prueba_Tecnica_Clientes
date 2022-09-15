<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$clientmsaid=$_SESSION['clientmsaid'];
  $accttype=$_POST['accounttype'];
 $cname=$_POST['cname'];
 $comname=$_POST['comname'];
 $address=$_POST['address'];
 $city=$_POST['city'];
 $state=$_POST['state'];
 $zcode=$_POST['zcode'];
 $wphnumber=$_POST['wphnumber'];
 $cellphnumber=$_POST['cellphnumber'];
 $ophnumber=$_POST['ophnumber'];
 $email=$_POST['email'];
 $websiteadd=$_POST['websiteadd'];
 $notes=$_POST['notes'];
 
$sql="update tblclient set AccountType=:accttype,ContactName=:cname,CompanyName=:comname,Address=:address,City=:city,State=:state,ZipCode=:zcode,Workphnumber=:wphnumber,Cellphnumber=:cellphnumber,Otherphnumber=:ophnumber,Email=:email,WebsiteAddress=:websiteadd,Notes=:notes where ID=:eid";
$query=$dbh->prepare($sql);
//$query->bindParam(':acctid',$acctid,PDO::PARAM_STR);
$query->bindParam(':accttype',$accttype,PDO::PARAM_STR);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
$query->bindParam(':comname',$comname,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':zcode',$zcode,PDO::PARAM_STR);
$query->bindParam(':wphnumber',$wphnumber,PDO::PARAM_STR);
$query->bindParam(':cellphnumber',$cellphnumber,PDO::PARAM_STR);
$query->bindParam(':ophnumber',$ophnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':websiteadd',$websiteadd,PDO::PARAM_STR);
$query->bindParam(':notes',$notes,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Client detail has been updated")</script>';
echo "<script type='text/javascript'> document.location ='manage-client.php'; </script>";
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Manejo de Clientes</title>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>
	<!--//skycons-icons-->
</head> 
<body>
<div class="page-container">
<!--/content-inner-->
<div class="left-content">
<div class="inner-content">
	
<?php //include_once('includes/header.php');?>
				<!--//outer-wp-->
<div class="outter-wp">
					<!--/sub-heard-part-->
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="add-client.php">Home</a></li>
<li class="active">Actualizar Clientes</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Actualizar Clientes </h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 
	<?php
$eid=$_GET['editid'];
$sql="SELECT * from tblclient where ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>								
	<div class="form-group"> <label for="exampleInputEmail1">Tipo de Cuenta</label> <select type="text" name="accounttype" class="form-control" required='true'>
		<option value="<?php echo htmlentities($row->AccountType);?>"><?php echo htmlentities($row->AccountType);?></option>
		<option value="Active Account">Activa</option>
		<option value="Inactive Account">Inactiva</option>
		<option value="Contact/Lead">Contacto</option>
		<option value="Unknown">Desconocido</option>
		
		
	</select> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Nombre</label> <input type="text" name="cname" value="<?php  echo $row->ContactName;?>" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Compañia</label> <input type="text" name="comname" value="<?php  echo $row->CompanyName;?>" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Direccion</label> <textarea type="text" name="address"  class="form-control" required='true' rows="4" cols="3"><?php  echo $row->Address;?></textarea> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Ciudad</label> <input type="text" name="city" value="<?php  echo $row->City;?>" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Estado</label> <input type="text" name="state" value="<?php  echo $row->State;?>" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Codigo Postal</label> <input type="text" name="zcode" value="<?php  echo $row->ZipCode;?>" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Telefono Fijo</label><input type="text" name="wphnumber" value="<?php  echo $row->Workphnumber;?>" class="form-control" maxlength='10' required='true' pattern="[0-9]+"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Telefono Celular</label><input type="text" name="cellphnumber" value="<?php  echo $row->Cellphnumber;?>" class="form-control" maxlength='10' pattern="[0-9]+"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Telefono Adicional</label><input type="text" name="ophnumber" value="<?php  echo $row->Otherphnumber;?>" class="form-control" maxlength='10' pattern="[0-9]+"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Email</label> <input type="email" name="email" value="<?php  echo $row->Email;?>" class="form-control" required='true'> </div> 
	<div class="form-group"> <label for="exampleInputPassword1">Pagina Web</label> <input type="text" name="websiteadd" value="<?php  echo $row->WebsiteAddress;?>" required='true' class="form-control"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Notas Adicionales</label> <textarea type="text" name="notes" class="form-control" required='true' rows="4" cols="3"><?php  echo $row->Notes;?></textarea> </div>
	<div class="form-group"> <label for="exampleInputPassword1">Fecha de Creacion</label> <input type="text" name="" value="<?php  echo $row->CreationDate;?>" required='true' class="form-control" readonly='true'> </div>
	<?php $cnt=$cnt+1;}} ?>
	 <button type="submit" class="btn btn-default" name="submit" id="submit">Actualizar</button><input type="button" class="btn btn-default" value="Back" onClick="history.back();return true;"> </form> 
</div>
</div>
</div> 
</div>
<?php include_once('includes/footer.php');?>
</div>
</div>		
<?php include_once('includes/sidebar.php');?>
<div class="clearfix"></div>		
</div>
<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>