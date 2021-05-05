<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

if(isset($_POST["adda3"]))
{
    $sql="INSERT INTO registered_payee
    (slno, payeename,accountnumber,accounttype,bankname,ifsccode)
    VALUES
    ('','$_POST[p_name3]','$_POST[ac_no3]','$_POST[ac_type3]','$_POST[bank_name3]','$_POST[code3]')";
    
    if (!mysqli_query($con,$sql))
      {
      die('Error: ' . mysql_error());
      }
    $successresult = "1 Record added";
}

if(isset($_POST["update3"]))
{                   
    mysqli_query($con,"UPDATE registered_payee SET payeename='$_POST[p_name3]',accountnumber='$_POST[ac_no3]',accounttype='$_POST[ac_type3]',bankname='$_POST[bank_name3]',ifsccode='$_POST[code3]' WHERE slno='$_POST[pid3]'");
    $updt= mysqli_affected_rows();
    if($updt==1)
    {
    $successresult="Record updated successfully";
    }   

}

if(isset($_POST["delete3"]))
{
    mysqli_query($con,"DELETE FROM registered_payee WHERE sl_no='$_POST[pid3]'");
    $updt= mysqli_affected_rows();
    if($updt==1)
    {
    $successresult="Record deleted successfully";
    }   
}

if(isset($_POST["btncancel"]))
{
    unset($_GET["payeeid"]);
}

$result = mysqli_query($con,"select * from registered_payee WHERE customerid='$_SESSION[customerid]'");

if(isset($_GET[payeeid]))           
{
$result1 = mysqli_query($con,"select * from registered_payee WHERE sl_no='$_GET[payeeid]'");
$arrvar1 = mysqli_fetch_array($result1);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Comenity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Revenue Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!-- gallery smoothbox -->
    <link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />
    <!-- team deoslide -->
    <link rel="stylesheet" href="css/jquery.desoslide.css">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- font-awesome icons -->
    <!-- //Custom Theme files -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //web-fonts -->
</head>

<body>
    
        <!-- nav-bottom -->
        <div class="inner-header">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1>
                        <a href="accountalerts.php">
                            <img src="images/logo.png"></a>
                    </h1s>
                </div>
                <!-- navbar-header -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="accountalerts.php">My accounts</a>
                        </li>
                        <li class="active">
                            <a href="transferfunds.php">Transfer funds</a>
                        </li>
                        <li>
                            <a href="payloans.php">Pay loans</a>
                        </li>
                       
                        <li>
                            <a href="mailinbox.php">Mails</a>
                        </li>
                         <li>
                            <a href="changetranspass.php">Personalise</a>
                        </li>
                         <li>
                            <a href="logout.php">logout</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </nav>
        </div>
    </div>
    <!--/nav ends here-->
    <!-- banner -->
    
        <div class="container"> 
        
           
                
            <div class="col-md-8"> 
             <h2>External payee</h2>
        <b></b><form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
<?php
if(isset($_POST['adda3']) || isset($_POST['update3']))
{
    ?>
            
          <table width="519" height="198" border="1">
             
                <tr>
                  <td colspan="2"><div align="center"><strong><?php echo $successresult; ?></strong></div></td>
                </tr>
                <tr>
                  <td width="206" height="26"><strong>Payee name</strong></td>
                  <td width="222"><label>
                 
                    <?php echo $_POST[p_name3]; ?>
                  </label></td>
              </tr>
                <tr>
                  <td height="27"><strong>Bank name</strong></td>
                  <td><label>
                  <?php
                 echo  $_POST[bank_name3];
                    ?>                   
              
                  </label></td>
              </tr>
                <tr>
                  <td height="29"><strong>Account number</strong></td>
                  <td><label>
                    <?php echo $_POST[ac_no3]; ?>
                  </label></td>
              </tr>
              
                <tr>
                  <td height="26"><strong>Account type</strong></td>
                  <td> <?php echo $_POST[ac_type3]; ?></td>
              </tr>
                <tr>
                  <td height="26"><strong>IFSC code</strong></td>
                  <td>
                <?php echo $_POST[code3]; ?>
      </td>
              </tr>
              </table>
<?php
}
else if(isset($_POST['delete3']))
{
?>    <table width="519" height="89" border="1">
                <tr>
                  <td width="428" height="83"><div align="center"><strong><?php echo $successresult; ?></strong></div></td>
              </tr>
            </table>
<?php
}
else
{
?>      
            
              <table class="table" width="519" height="344" style="margin-top: 10px">
                <tr>
                  <td colspan="1"><div align="center" style="margin-top: 10px"><strong>Add External Payee</strong></div></td>
              </tr>
                <tr>
                  <td style="width: 30%; "><strong>Payee name</strong></td>
                  <td width="222">
                    <input class="form-control" style="width: 20%" name="pid3" type="hidden" id="pid3" value="<?php echo $arrvar1[sl_no]; ?>" />
                    <input class="form-control" style="width: 40%" name="p_name3" type="text" id="p_name3" size="35" value="<?php echo $arrvar1['payee_name']; ?>" />
                      </td>
              </tr>
                <tr>
                  <td><strong>Bank name</strong></td>
                  <td><label>
        
                  
                
                    <select class="form-control" style="width: 100%" name="bank_name3" id="bank_name3">
                      <option value="">Select Bank name</option>
                      <?php
                      $arr = array("Canara Bank","HDFC Bank","Axis Bank","Federal Bank");
                    foreach($arr as $value)
                    {
                        if($arrvar1[bank_name] == $value)
                        {   
                        echo "<option value='$value' selected>$value</option>"; 
                        }
                        else
                        {
                        echo "<option value='$value'>$value</option>";  
                        }
                    }
                    ?>
                  </select>
                </label></td>
              </tr>
                <tr>
                  <td><strong>Account number</strong></td>
                  <td><label>
                    <input class="form-control" style="width: 60%" name="ac_no3" type="text" id="ac_no3" size="35"  value="<?php echo $arrvar1['account_no']; ?>" />
                </label></td>
              </tr>
                <tr>
                  <td><strong>Account type</strong></td>
                  <td>
                    <?php            
                    $arr = array("SAVINGS ACCOUNT","CURRENT ACCOUNT");
                    echo "<select class='form-control' style='width:50%' name='ac_type3' id='ac_type3'>";
                        foreach($arr as $value) 
                        {
                            if($arrvar1[acc_type] == $value)
                            {   
                            echo "<option value='$value' selected>$value</option>";
                            }
                            else
                            {
                            echo "<option value='$value'>$value</option>";  
                            }
                        }
                    ?>
                </select>
                </td>
              </tr>
                <tr>
                  <td><strong>IFSC code</strong></td>
                  <td><input class="form-control" style="width: 50%" name="code3" type="text" id="code3" size="35"  value="<?php echo $arrvar1['ifsc_code']; ?>"  /></td>
              </tr>
                <tr>
                  <td height="54" colspan="2"><div align="center">
                    <?php
if(isset($_GET['payeeid']))         
{
?>
                    <input type="submit" name="update3" id="update3" value="update" />
                    <input type="submit" name="btncancel3" id="btncancel3" value="Cancel" />
                    <input type="submit" name="delete3" id="delete3" value="Delete" />
                    <?php
}
else
{
    ?>
                    <button class="btn btn-success" type="submit" name="adda3" id="adda3" value="Add Bank Account">Add Bank Account</button>
                    <?php
}
?>
                </div></td>
              </tr>
            </table>
<?php
}
?>
          </form>
       </div>

       <div style="margin-top: 90px; background-color: rgb(245, 241, 241); height: 200px" class="col-md-4">
         <?php
if($_GET['view']!="regpayee")
{
    ?>
        <ul class="nav flex-column">
        <li class="nav-item">
         <a class="nav-link" href="addexternalpayee.php">Add External Recipient</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="viewexternalpayee.php">View registered Recipient</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Makepayment.php">Make a Transfer</a>
        </li>
        <li class="nav-item">
         <a class="nav-link"  href="Transactionmade.php?pst=Complete">Transfer History</a><p>&nbsp;</p>
        </li>
        
        </ul>
           
           <?php
}
?>
       </div>
           
    </div>
    <!-- //banner -->
    <!--about -->
    
  
    
    <!-- //testimonials -->
    <!-- contact -->
    <div class="contact-main section" id="contact">
        <div class="container">
            <h3 class="title-txt">
                <span>c</span>ontact us</h3>
            <div class="col-md-4 contact-leftgrid">
                <div class="contact-g1">
                    <h6>Get In Touch</h6>
                    <ul class="address">
                        <li>
                            <span class="fa fa-phone" aria-hidden="true"></span>
                            (+1) 813-328-1453
                        </li>
                        
                        <li>
                            <span class="fa fa-map-marker" aria-hidden="true"></span>
                            PO Box 183003
                            Columbus, Ohio 43218

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 contact-center">
                <div class="col-md-4 contact-g2">
                    <h6>Follow us</h6>
                    <div class="address-grid">

                        <ul class="social-icons3">

                            <li>
                                <a href="#" class="s-iconfacebook">
                                    <span class="fa fa-facebook" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icontwitter">
                                    <span class="fa fa-twitter" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icondribbble">
                                    <span class="fa fa-dribbble" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-iconbehance">
                                    <span class="fa fa-behance" aria-hidden="true"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 contact-g3">
                    <div class="subscribe-grid ">
                        <p>subscribe To receive helpful articles, customer alerts,services & more.</p>

                        <form action="#" method="post">
                            <input type="email" placeholder="Your Email" name="Subscribe" required="">
                            <button class="btn1">
                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="map text-center">
            <h2>Our wide range of Branches </h2>

            <img src="images/map.jpg" alt="" class="img-responsive" />
        </div>
        <div class="section contact-bottom">
            <div class="container">
                <div class="col-lg-6 col-md-6  contact-right-grid">
                    <h6>send us a message</h6>
                    <div class="agileits-main-right">
                        <form action="#" method="post" class="agile_form">
                            <label class="header">Name</label>
                            <div class="icon1 w3ls-name1">
                                <input placeholder=" " name="first name" type="text" required="">
                            </div>
                            <div class="icon2">
                                <label class="header">Email</label>
                                <input placeholder=" " name="Email" type="email" required="">
                            </div>
                            <label class="header">your message</label>
                            <textarea class="w3l_summary" required=""></textarea>
                            <input type="submit" value="SEND">
                        </form>
                    </div>
                </div>
                <div class="col-md-6 contact-bot">
                    <div class="contact-list">

                        <h6> Open a free checking account online today </h6>
                        <ul class="cbot-list">
                            <li>
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>Do Today to Plan for Tomorrow
                                <p>Discover how to juggle today's uncertain environment while planning for the future.</p>
                            </li>
                            <li>
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>Tips for Your Home Appraisal
                                <p>Receive the maximum value for your next home appraisal with our tips!</p>
                            </li>

                            <li>
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>Mobile card control
                                <p>Turn your card on and off instantly!</p>
                            </li>

                        </ul>
                        <a href="#" class="log contact-link" data-toggle="modal" data-target="#myModal">create a new account</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- contact -->
    <!-- copy right -->
    <p class="footer-class">© 2018 Revenue. All Rights Reserved 
        
    </p>
    <!-- //copy right -->
    <!-- bootstrap-pop-up for login and register -->
    <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Be a Member of Revenue
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <section>
                    <div class="modal-body">
                        <div class="loginf_module">
                            <div class="module form-module">
                                <div class="toggle">
                                    <i class="fa fa-times fa-pencil"></i>
                                    <div class="tooltip">Click Me</div>
                                </div>

                                <?php if(isset($logininfo))
                                {  echo"<div class='form' style='width:450px;'><h1>$logininfo</h1></div>"; } ?>  


                                <div class="form ">
                                    <h3>Login to your account</h3>
                                    <form action="login.php" method="POST">
                                        <input type="text" name="login" class="loginput" placeholder="Username" required="">
                                        <input type="password" name="password" class="loginput" placeholder="Password" required="">
                                        <input type="submit" name="go" id="go" value="Login" class="loginput">
                                    </form>
                                    <div class="cta">
                                        <a href="login.php?error=forgetpass">Forgot password?</a>
                                    </div>
                                </div>
                                <div class="form">
                                    <h3>Create a new account</h3>
                                    <form action="#" method="post">
                                        <input type="text" name="Username" placeholder="Username" required="">
                                        <input type="password" name="Password" placeholder="Password" required="">
                                        <input type="email" name="Email" placeholder="Email address" required="">
                                        <input type="text" name="Phone" placeholder="Phone Number" required="">
                                        <input type="submit" value="Register">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- //bootstrap-pop-up for login and register-->

    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- about numscroller -->
    <script src="js/numscroller-1.0.js"></script>
    <!-- //about numscroller -->
    <!-- banner Slider starts Here -->
    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 3
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- //banner slider script ends -->
    <!-- sign in and signup pop up toggle script -->
    <script>
        $('.toggle').click(function () {
            // Switches the Icon
            $(this).children('i').toggleClass('fa-pencil');
            // Switches the forms  
            $('.form').animate({
                height: "toggle",
                'padding-top': 'toggle',
                'padding-bottom': 'toggle',
                opacity: "toggle"
            }, "slow");
        });
    </script>
    <!-- sign in and signup pop up toggle script -->
    <!-- team desoslide-JavaScript -->
    <script src="js/jquery.desoslide.js"></script>
    <script>
        $('#demo1_thumbs').desoSlide({
            main: {
                container: '#demo1_main_image',
                cssClass: 'img-responsive'
            },
            effect: 'sideFade',
            caption: true
        });
    </script>
    <!-- //team desoslide-JavaScript -->
    <!-- Flexslider-js for-testimonials -->
    <script src="js/jquery.flexisel.js"></script>
    <script>
        $(window).load(function () {
            $("#flexiselDemo1").flexisel({
                visibleItems: 1,
                animationSpeed: 1000,
                autoPlay: false,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 1
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 1
                    }
                }
            });

        });
    </script>
    <!-- //Flexslider-js for-testimonials -->
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- gallery smoothbox -->
    <script src="js/smoothbox.jquery2.js"></script>
    <!-- //gallery smoothbox -->
    <!-- Bootstrap core JavaScript
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
function validateForm()
{
        
    var x   =   document.forms["form1"]["p_name3"].value;
    var y   =   document.forms["form1"]["ac_no3"].value;
    var z   =   document.forms["form1"]["code3"].value;
  if (x==null || x=="")
  {
  alert("Payee name must be filled out");
  return false;
  }
  if (y==null || y=="")
  {
  alert("Account number must be filled out");
  return false;
  }
  if (z==null || z=="")
  {
  alert("Ifsc code must be filled out");
  return false;
  }
}
</script>
</body>

</html>