<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!($_SESSION["adminid"]))
{
		header("Location: emplogin.php");
}
$loantypearray = mysql_query("select * from loantype");
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
        
        
        </div>
    </nav>
</div>
    <!--img id="contain" src="images/batman2.jpg">
    <div><img src="images/batman1.png" id="batimg1"><img src="images/batman1.png" id="batimg2"></div>
    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/logo.png" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Bank of RDEC</span></a></h1>
            <p style="float:right; margin-right: 2.2em; color: buttonface; font-family: Satisfy,cursive; font-size: 2.5em;"></p>
            
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
        <br/><br/><br/>
        <table width="883" border="1" id="brtable">
    <tr>
      <th width="113" scope="col"><a href="viewbranch.php">BRANCH</a></th>
      <th width="133" scope="col"><a href="addaccountmaster.php">ACCOUNT TYPES</a></th>
      <th width="87" scope="col"><a href="viewemp.php">EMPLOYEES</a></th>
      <th width="162" scope="col"><a href="viewloantype.php">LOAN TYPE</a></th>
    </tr>
    <tr>
        <th colspan="4"><a href="addloan.php">Add new loan type</a></th>
    </tr>
        </table>
        <br/><br/><br/>
    <table height="37" border="1">
      <tr>
        <th width="112" scope="col">LOAN TYPE</th>
        <th width="82" scope="col">PREFIX</th>
        <th width="186" scope="col">MAXIMUM AMT</th>
        <th width="161" scope="col">MINIMUM AMT</th>
        <th width="98" scope="col">INTEREST</th>
        <th width="119" scope="col">STATUS</th>
      </tr>
      <?php	
 while($loantypes = mysql_fetch_array($loantypearray))
	  {
echo "
      <tr>
        <td>&nbsp;$loantypes[loantype]</td>
        <td>&nbsp;$loantypes[prefix]</td>
        <td>&nbsp;$loantypes[maximumamt]</td>
        <td>&nbsp;$loantypes[minimumamt]</td>
        <td>&nbsp;$loantypes[interest]</td>
        <td>&nbsp;$loantypes[status]</td>
        
      </tr>";
	  }
	  ?>
    </table>
    </div>
</div>


<div class="container">
        
           
        
        <hr>
    </div>

    <div class="container">
        <div class="footer">
            <div class="row">
                <div style="color: rgb(1, 1, 153);;" class="col-3">
                    <h5>Popular Requests</h5>
                    <h6>Routing & Transit Number:</h6>
                    <p>061201754</p>
                    
                    <h6>Swift Code:</h6>
                    <p>WFBIUS6S</p>
                    <p>Order Checks</p>
                    <p>The Lion's Share blog</p>
                </div>

                <div style="color: rgb(1, 1, 153);" class="col-3">
                    <h5>Connect with us</h5>
                    <h6>Customer Care:</h6>
                    <p>813-328-1453</p>
                    <p>Contact us</p>
                    <p>Locations</p>
                    <p>Customer Experience Survey</p>
                    <p>Careers</p>
                </div>

                <div style="color: rgb(1, 1, 153);" class="col-6">
                    <h5>Banking Beyond Convention</h5>
                    <p>
                        Ameris Bank is a financial institution serving customers 
                        across the Southeast and Mid-Atlantic. Through online account opening, 
                        customers across the nation can benefit from Ameris Bank products and services. 
                        Ameris Bank has full-service locations in Alabama, Florida, Georgia and South Carolina and 
                        mortgage-only locations in Alabama, Georgia, Florida, South Carolina, North Carolina, Virginia, Maryland and Tennessee.
                    </p>
                </div>
                

            </div>
        </div>
    </div>
    </div>
</body>
</html>
