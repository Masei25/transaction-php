<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_SESSION['customerid']))
{
	header("Location: accountalerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: admindashboard.php");
}
if (isset($_SESSION['employeeid']))
{
    header("Location:employeeacount.php");
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
    <!--img id="contain" src="images/5.jpg">
    <div><img src="images/batman1.png" id="batimg1"><img src="images/batman1.png" id="batimg2"></div>
    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/login.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Bank of RDEC</span></a></h1>
            <p style="float:right; margin-right: 2.2em; color: buttonface; font-family: Satisfy,cursive; font-size: 2.5em;"></p>
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div style="margin-left: 12%" id="toptabmenu">
    <ul id="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="branches.php">Branches</a></li>
        <li><a href="help.php">Help & FAQ</a></li>
        <li><a href="">Downloads</a>
            <ul>
                <li><a href="downloads/New_Account.pdf">New Account form</a></li>
                 <li><a href="">Loan Forms</a>
                 <ul>
                <li><a href="downloads/home_loan_application_form.pdf">Home Loan</a></li>
                 <li><a href="downloads/Car_Loan_Application_Form.pdf">Car Loan</a></li>
                  <li><a href="downloads/Education_Loan_Application_Form.pdf">Educational Loan</a></li>
            </ul>
                 </li>
                  <li><a href="downloads/ChequeBook_Request.pdf">Cheque book request</a></li>
            </ul>
        </li>
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
    
</div>
</div>
     <div id="templatemo_main">
        <div class="image view"><img src="images/img_4.jpg" alt="The bank of RDEC" title="The bank of RDEC" /><div class="mask">  
     <h2 style="text-align: center;">CHAIRMAN</h2>  
     <p style="text-align: center">Mr. Animesh Gaur</p><br/><br/>
     <h2 style="text-align: center;">EXECUTIVE DIRECTOR</h2>  
     <p style="text-align: center;">Ms. Ananya Goshi</p>
     
     </div></div>
         <div class="brcont"><h2 style="text-align: center;">Ameris Bank</h2><br/>Our branch in New York city is also popularly known as "Ameris Bank", named after the legendary Iron Man. 
             As Tony Stark's newest financial institution, The Ameris Bank has a proud tradition of providing friendly, 
             personalized service and convenient, full-service banking.Our experienced staff of banking professionals can answer your 
             questions and help you make the most of your money. We offer an array of traditional banking services such as checking, 
             savings, certificates of deposit, loan and individual retirement accounts plus, customer conveniences like 24-hour telephone 
             banking and area network of surcharge-free automated teller machines.Our staff also includes a team of experienced mortgage,
             consumer, commercial and agricultural lenders who can offer you competitive interest rates, local loan decisions and on-site
             loan servicing.<br/><br/>

             <h3 style="text-align: center;">Banking Hours</h3>
             <p style="text-align: center;">Mon-Thurs: 8:00am to 4pm</p>
             <p style="text-align: center;">Friday: 8:00am to 3:30pm</p>
             <p style="text-align: center;">Saturday: 8:00am to noon</p>
             

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
</body>
</html>

