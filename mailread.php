<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if((!(isset($_SESSION['customerid'])))&&(!(isset($_SESSION['adminid']))))
    header('Location:login.php?error=nologin');

if(isset($_GET["mailid"]))
{
	$mailres=mysql_query("SELECT * FROM mail where mailid='$_REQUEST[mailid]'");
        $mailarr=  mysql_fetch_array($mailres);
        if (!($mailarr['senderid']=='admin'))
        {
            $mailresult=  mysql_query("SELECT * FROM customers WHERE customerid='".$mailarr['senderid']."'");
            $mailresarr = mysql_fetch_array($mailresult);
            $sendername = $mailresarr['firstname']." ".$mailresarr['lastname'];
        }
        else
            $sendername='admin';
        if (!($mailarr['reciverid']=='admin'))
        {
            $mailresult=  mysql_query("SELECT * FROM customers WHERE customerid='".$mailarr['reciverid']."'");
            $mailresarr = mysql_fetch_array($mailresult);
            $receivername = $mailresarr['firstname']." ".$mailresarr['lastname'];
        }
        else
            $receivername='admin';
        if(mysql_num_rows($mailres)==0)
        {
            $mailerr="Mail Do No Exist/Mail Expired/Viewing Authorization Failed";
        }
        if (isset($_SESSION['customerid']))
        {
            if (!(($mailarr['senderid']==$_SESSION['customerid'])||($mailarr['reciverid']==$_SESSION['customerid'])))
                $mailerr="Mail Do No Exist/Mail Expired/Viewing Authorization Failed";
        }
        else
        { 
            if (!(($mailarr['senderid']=='admin')||($mailarr['reciverid']=='admin')))
                $mailerr="Mail Do No Exist/Mail Expired/Viewing Authorization Failed";
        }
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
<div style="margin-left: 12%" id="toptabmenu">
    <?php if(isset($_SESSION['customerid'])) { ?>
    <ul>
            <li><a href="accountalerts.php">My accounts</a></li>
            <li><a href="transferfunds.php">Transfer funds</a></li>
            <li><a href="payloans.php">Pay loans</a></li>
            <li><a href="mailinbox.php">Mails</a></li>
            <li><a href="changetranspass.php">Personalise</a></li>
            <li><a href="logout.php">logout</a></li>
    </ul>
    <?php } else if (isset($_SESSION['adminid'])) { ?>
    <ul>
            <li><a href="admindashboard.php">Dashboard</a></li>
            <li><a href="viewbranch.php">Settings</a></li>
            <li><a href="viewcustomer.php">customers</a></li>
            <li><a href="viewtransaction.php">Transactions</a></li>
            <li><a href="mailinbox.php">Mail</a></li>
            <li><a href="logout.php">logout</a></li>
    </ul>
    <?php } ?>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
        <h2 align="center">Read Mail</h2>
            <?php if(isset($mailerr))
                        echo"<h1>$mailerr</h1>";
                  else { ?>
         <table width="600" border="1" id="brtable">
             <tr>
                 <td>From:</td>
                 <td><?php echo $sendername ?></td>
             </tr>
             <tr>
                 <td>To:</td>
                 <td><?php echo $receivername ?></td>
             </tr>
             <tr>
                 <td>Subject:</td>
                 <td><?php echo $mailarr['subject'] ?></td>
             </tr>
             <tr>
                 <td>Time:</td>
                 <td><?php echo $mailarr['mdatetime'] ?></td>
             </tr>
             <tr>
                 <td>Message:</td>
                 <td><?php echo $mailarr['message'] ?></td>
             </tr>
         </table>
        <?php } ?>
    </div>
    
    <div id="sidebar">
         <h2>Mails</h2>
                
                <ul>
               <li><a href="mailinbox.php"><strong>Inbox</strong></a></li>
                <li><strong><a href="mailcompose.php">Compose</a></strong></li>
                <li><strong><a href="mailsent.php">Sent mail</a></strong>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
