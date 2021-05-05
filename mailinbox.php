<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if((!(isset($_SESSION['customerid'])))&&(!(isset($_SESSION['adminid']))))
    header('Location:login.php?error=nologin');

if(isset($_GET["mailid"]))
{
    mysqli_query($con,"DELETE FROM mail where mailid='$_GET[mailid]'");
    $recres = "Mail deleted Successfully...";
}
if(isset($_SESSION['adminid']))
$result = mysqli_query($con,"SELECT * FROM mail where reciverid='$_SESSION[adminid]'");
else if(isset($_SESSION['customerid']))
    $result= mysqli_query($con,"SELECT * FROM mail where reciverid='$_SESSION[customerid]'");
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
                    <?php if(isset($_SESSION['customerid'])) { ?>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="accountalerts.php">My accounts</a>
                        </li>
                        <li>
                            <a href="transferfunds.php">Transfer funds</a>
                        </li>
                        <li>
                            <a href="payloans.php">Pay loans</a>
                        </li>
                       
                        <li class="active">
                            <a href="mailinbox.php">Mails</a>
                        </li>
                         <li>
                            <a href="changetranspass.php">Personalise</a>
                        </li>
                         <li>
                            <a href="logout.php">logout</a>
                        </li>
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
                <div class="clearfix"> </div>
            </nav>
        </div>
    </div>
    <!--/nav ends here-->
    <!-- banner -->
    
        <div class="container"> 
        
           
                
            <div class="col-md-8"> 
                <h2 style="margin-top: 20px" align="center">INBOX</h2>
            <form>
            <?php echo $recres; ?>
            <table style="margin-top: 30px" class="table" width="600" border="0" id="brtable">
    
             <tbody>
                
              <?php
                echo "<thead>";
                echo " <tr class='info'>";
                echo " <th scope='col' width='45' >Delete</th>";
                echo " <th scope='col'>Read</th>";
                echo " <th scope='col'>SENDER</th>";
                echo " <th scope='col'>SUBJECT</th>";
                echo " <th scope='col'>TIME</th>";
                echo " </tr>";
                echo "</thead>";
                while($row = mysqli_fetch_array($result))
                { $rid=$row['senderid'];
                                  if (!($rid=='admin'))
                                  {
                                      $rres=  mysqli_query($con,"SELECT * FROM customers WHERE customerid='".$rid."'");
                                      $rresarr = mysqli_fetch_array($rres);
                                      $recid = $rresarr['firstname']." ".$rresarr['lastname'];
                                  }
                                  else
                                      $recid=$rid;
                echo " <tr>";
                echo " <th scope='col'><a href='mailinbox.php?mailid=$row[mailid]'>Delete</a></th>";
                echo " <th scope='col'><a href='mailread.php?mailid=$row[mailid]'>Read</a></th>";
                echo " <th scope='col'>$recid</th>";
                echo " <th scope='col'>$row[subject]</th>";
                echo " <th scope='col'>$row[mdatetime]</th>";
                echo " </tr>";
                }
?>       
    </tbody>  
      </table>
          </form>
            </div>

       <div style="margin-top: 50px; background-color: rgb(245, 241, 241); height: 200px" class="col-md-4">
        <ul class="nav flex-column">
        <li class="nav-item">
         <a class="nav-link" href="mailinbox.php">Inbox</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="mailcompose.php">Compose</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mailsent.php">Sent mail</a>
        </li>
        
        
        </ul>
           
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
</body>

</html>