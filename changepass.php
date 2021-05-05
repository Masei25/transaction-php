<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!($_SESSION["adminid"]))
{
		header("Location:login.php");
}

if(isset($_POST["button"]))
{
    if (mysql_real_escape_string($_POST[newpass]) == $_POST[newpass])
    {
mysql_query("UPDATE employees SET password='$_POST[newpass]' WHERE loginid = '$_POST[loginid]' AND password='$_POST[oldpass]'");
	if(mysql_affected_rows() == 1)
	{
	$ctrow = "Password updated successfully..";
	}
	else
	{
	$ctrow = "Failed to update Password";
	}
    }
    else
        $ctrow = "Invalid New Password";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="images/favicon.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ameris Bank</title>



<link type="text/css" rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="vendors/font-awesome/css/font-awesome.css">
<link type="text/css" rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css/styles.css">
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="vendors/bootstrap/popper.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap/bootstrap.min.js"></script>




<script>
function validateForm()
{
var x=document.forms["form1"]["loginid"].value;
var y=document.forms["form1"]["oldpass"].value;
var z=document.forms["form1"]["newpass"].value;
var a=document.forms["form1"]["confpass"].value;
if (x==null || x=="")
  {
  alert("Login id must be filled out");
  return false;
  }
  if (y==null || y=="")
  {
  alert("Old password must be filled out");
  return false;
  }
  if (z==null || z=="")
  {
  alert("New password must be filled out");
  return false;
  }
   if (a==null || a=="")
  {
  alert("Password must be confirmed");
  return false;
  }
  if(!(z==a))
      {
          alert("Password Mismatch");
          return false;
      }
}
</script>


</head>
<body>

  <div class="header">
    <div class="alert-1">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <a href="#"><strong style="color:white">(COVID-19) CORONAVIRUS UPDATE  </strong></a> - We are committed to your financial wellness, and to helping you stay healthy and informed.
    </div>
    <div class="alert-2">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>Legacy Fidelity Bank Customers click here to make an Auto Loan Payment. To obtain auto loan payoffs, call our auto loan automated telephone banking line at 404.553.2288.</p>
    </div>
    <!--Nav bar section-->

    <nav class="navbar navbar-expand-sm">
        <div class="container">
        <!--Header logo-->
        
        <div class="col-4">
        <a class="navbar-brand">
            <img src="img/logo.PNG">
        </a>
        </div>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <i class="fa fa-reorder"></i>
        </button>

        <!--middle header link-->
        <div class="collapse navbar-collapse" id="navbarNav">
        <div style="font-size:larger; margin-left:5%; font-family: 'Times New Roman', Times, serif;" class="col-6">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">BUSINESS</a></li>
            <li class="nav-item"><a class="nav-link" href="#">PERSONAL</a></li>
            <li class="nav-item"><a class="nav-link" href="#">WEALTH</a></li>
        </ul>
        </div>

        <!--left header link-->
        <div style="font-size: small; margin-left: 5%; font-family: 'Times New Roman', Times, serif;" class="col-2">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Locations</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Investors</a></li>
            </ul>
        </div>
        </div>
    <!--img id="contain" src="images/batman2.jpg">
    <div><img src="images/batman1.png" id="batimg1"><img src="images/batman1.png" id="batimg2"></div>
    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/login.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Bank of Gotham City</span></a></h1>
            <p style="float:right; margin-right: 2.2em; color: buttonface; font-family: Satisfy,cursive; font-size: 2.5em;">.......A Silent Guardian</p>
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div style="margin-left: 12%"  id="toptabmenu">
    <ul>
            <li><a href="admindashboard.php">Dashboard</a></li>
            <li><a href="viewbranch.php">Settings</a></li>
            <li><a href="viewcustomer.php">customers</a></li>
            <li><a href="viewtransaction.php">Transactions</a></li>
            <li><a href="mailinbox.php">Mail</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
       <h2>Change Login password</h2>

        	<form id="form1" name="form1" method="post" action=""onsubmit="return validateForm()">
     
        	  <table width="561" height="292" border="0">
        	    <tr>
        	      <th colspan="2" scope="row">&nbsp;
			
				    <?php 
				echo $ctrow;	
				  ?>				  
		</th>
       	        </tr>
        	    <tr>
        	      <th width="341" height="45">LOGIN ID</th>
        	      <td width="245"><input name="loginid" type="text" id="loginid" size="35" readonly="readonly" value="<?php echo $_SESSION["adminid"]; ?>"/>
                  </td>
      	      </tr>
        	    <tr>
        	      <th height="49">OLD PASSWORD</th>
        	      <td><input name="oldpass" type="password" id="oldpass" size="35" /></td>
      	      </tr>
        	    <tr>
        	      <th height="44" >NEW PASSWORD</th>
        	      <td><input name="newpass" type="password" id="newpass" size="35" /></td>
      	      </tr>
        	    <tr>
        	      <th height="43">CONFIRM PASSWORD</th>
        	      <td><input name="confpass" type="password" id="confpass" size="35" /></td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td><button class="btn btn-primary" type="submit" name="button" id="button" value="UPDATE PASSWORD">UPDATE PASSWORD</button></td>
      	      </tr>
      	    </table>
          </form>
    </div>
    
    <div id="sidebar">
        <h2>Dashboard</h2>
                
                <ul>
                <li><a href="admindashboard.php">Home</a></li>
                <li><a href="changepass.php">Change Password</a></li>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
