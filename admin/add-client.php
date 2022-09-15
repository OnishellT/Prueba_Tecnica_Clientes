<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$clientmsaid=$_SESSION['clientmsaid'];
 $acctid=mt_rand(100000000, 999999999);
 $accttype=$_POST['accounttype'];
 $password=md5($_POST['password']);
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
 
$sql="insert into tblclient(AccountID,AccountType,ContactName,CompanyName,Address,City,State,ZipCode,Workphnumber,Cellphnumber,Otherphnumber,Email,WebsiteAddress,Notes,Password)values(:acctid,:accttype,:cname,:comname,:address,:city,:state,:zcode,:wphnumber,:cellphnumber,:ophnumber,:email,:websiteadd,:notes,:password)";
$query=$dbh->prepare($sql);
$query->bindParam(':acctid',$acctid,PDO::PARAM_STR);
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
$query->bindParam(':password',$password,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Client has been added.")</script>';
echo "<script>window.location.href ='add-client.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
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
	
<?php include_once('includes/header.php');?>
				<!--//outer-wp-->
<div class="outter-wp">
					<!--/sub-heard-part-->
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="add-client.php">Home</a></li>
<li class="active">Nuevo Cliente</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Nuevo Cliente</h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 
									
	<div class="form-group"> <label for="exampleInputEmail1">Tipo de Cliente</label> 
		<select  name="accounttype"  class="form-select form-select-lg mb-3" required='true'>
		<option value="Active Account">Activa</option>
		<option value="Inactive Account">Inactiva</option>
		<option value="Contact/Lead">Contacto</option>
		<option value="Unknown">Desconocido</option>
		
	</select> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Nombre</label> <input type="text" name="cname" placeholder="Nombre" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Compañia</label> <input type="text" name="comname" placeholder="Compañia" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Direcciones</label> <textarea type="text" name="address" placeholder="Direcciones" value="" class="form-control" required='true' rows="4" cols="3"></textarea> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Ciudad</label> <input type="text" name="city" placeholder="Ciudad" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Estado</label> <input type="text" name="state" placeholder="Estado" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Codigo Postal</label> <input type="text" name="zcode" placeholder="Codigo Postal" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Telefono Fijo</label><input type="text" name="wphnumber" value="" placeholder="Telefono Fijo"  class="form-control" maxlength='10' required='true' pattern="[0-9]+"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Telefono Celular</label><input type="text" name="cellphnumber" value="" placeholder="Telefono Celular"  class="form-control" maxlength='10' pattern="[0-9]+"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Telefono Adicional</label><input type="text" name="ophnumber" value="" placeholder="Telefono Adicional"  class="form-control" maxlength='10' pattern="[0-9]+"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Email</label> <input type="email" name="email" value="" placeholder="Email" class="form-control" required='true'> </div> 
<div class="form-group"> <label for="exampleInputEmail1">Contraseña</label>
	<input placeholder="password" type="password" name="password" required="true" id="password" class="form-control">
</div>
	<div class="form-group"> <label for="exampleInputPassword1">Pagina Web</label> <input type="text" name="websiteadd" value="" placeholder="Pagina Web" required='true' class="form-control"> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Notas Adicionales</label> <textarea type="text" name="notes" placeholder="Notas Adicionales" value="" class="form-control" required='true' rows="4" cols="3"></textarea> </div>

	
	 <button type="submit" class="btn btn-default" name="submit" id="submit">Guardar</button> </form> 
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