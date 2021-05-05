<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(($_REQUEST['error'])=='nologin')
    $logininfo="Please Sign In to Continue";
else if(($_REQUEST['error'])=='forgetpass')
    $logininfo="Please contact the nearest branch";
if(isset($_SESSION['customerid']))
{
    header("Location: accountalerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: admindashboard.php");
}
if ((isset($_REQUEST['login'])))
{
$password = mysql_real_escape_string($_REQUEST['password']);
$logid= mysql_real_escape_string($_REQUEST['login']);
$query="SELECT * FROM customers WHERE loginid='$logid' AND accpassword='$password'";
$res=  mysql_query($query);
if(mysql_num_rows($res) == 1)
    {
        while($recarr = mysql_fetch_array($res))
        {
            
        $_SESSION['customerid'] = $recarr['customerid'];
        $_SESSION['ifsccode'] = $recarr['ifsccode'];
        $_SESSION['customername'] = $recarr['firstname']. " ". $recarr['lastname'];
        $_SESSION['loginid'] = $recarr['loginid'];
        $_SESSION['accstatus'] = $recarr['accstatus'];
        $_SESSION['accopendate'] = $recarr['accopendate'];
        $_SESSION['lastlogin'] = $recarr['lastlogin'];      
        }
        $_SESSION["loginid"] =$_POST["login"];
        header("Location: accountalerts.php");
    }
else{
    $res = mysql_query("SELECT * FROM employees WHERE loginid='$logid' AND password='$password'");


    if(mysql_num_rows($res) == 1)
    {
        $_SESSION["adminid"] =$_POST["login"];
        header("Location: admindashboard.php");
    }
    else
    {
        $logininfo = "Invalid Username or password entered";
    }
}
}
?>



<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Revenue Banking Category Responsive website Template | Home :: w3layouts</title>
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
    <div class="top-nav">
        <!--nav top-->
        <div class="container">

            <div class="navbar-top">
                <div class="nav-top-left">
                    <ul>
                        <li>
                            <a href="#" class="log" data-toggle="modal" data-target="#myModal">Login</a>
                        </li>
                        <li>
                            <a href="#" class="log" data-toggle="modal" data-target="#myModal">register</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-top-right">
                    <ul>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i> (+1) 813-328-1453</li>
                        
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
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
                        <a href="index.html">
                            <img src="images/logo.png"></a>
                    </h1s>
                </div>
                <!-- navbar-header -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="#about" class="scroll">About</a>
                        </li>
                        <li>
                            <a href="#services" class="scroll">Services</a>
                        </li>
                       
                        <li>
                            <a href="#contact" class="scroll">contact</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </nav>
        </div>
    </div>
    <!--/nav ends here-->
    <!-- banner -->
    <div class="banner">
        <div class="banner-right">
            <img src="images/new.png" alt="" class="img-responsive" />
        </div>
        <div class="banner-text">
            <div id="top" class="callbacks_container">
                <ul class="rslides" id="slider3">
                    <li>
                        <div class="banner-textagileinfo">
                            <h6>Welcome To Revenue</h6>
                            <h3>For Your Personal And Professional Banking Needs.</h3>
                            

                        </div>
                    </li>
                    <li>
                        <div class="banner-textagileinfo">
                            <h6>the Internet banking portal</h6>
                            <h3>Ensuring a high level of customer service.</h3>
                            

                        </div>
                    </li>
                    <li>
                        <div class="banner-textagileinfo">
                            <h6>Ideal for Personal Banking</h6>
                            <h3>For Your Personal And Professional Banking Needs.</h3>
                          

                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <!-- //banner -->
    <!--about -->
    <div id="about" class="section">
        <h3 class="title-txt">
            <span>a</span>bout us</h3>
        <div class="abt-container">
            <fieldset>
                <legend>Building the Finest Quality Bank.</legend>
                <div class="stats-info">
                    <div class="col-sm-3 col-xs-3 stats-grid">
                        <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='324' data-delay='.5' data-increment="1">324</div>
                        <div class="stats-img stat2">
                            <p>branches</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3 stats-grid">
                        <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='574' data-delay='.5' data-increment="1">574</div>
                        <div class="stats-img stat2">
                            <p>personal loans</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3 stats-grid stat1">
                        <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='350' data-delay='.5' data-increment="1">350</div>
                        <div class="stats-img stat2">
                            <p>ATM's</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3 stats-grid stat1">
                        <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='874' data-delay='.5' data-increment="1">874</div>
                        <div class="stats-img stat2">
                            <p>Deposit Accounts</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="abt-pos">
                    <div class="col-md-6  about-left">
                        <h3 class="title">GET WHAT YOU NEED, WHEN YOU NEED IT.</h3>
                        <p class="about-bottom">At Comenity Bank, we go out of our way to get things done for you.
                        That means we find creative solutions for your banking needs and make decisions locally, empowering bankers to get things done for you. </p>
                        <a href="#services" class="abtlink scroll">read more</a>

                        <img src="images/c.png" class="img-responsive" alt="" />
                    </div>
                    <div class="col-md-6 w3ls-row">
                        <img src="images/a.jpg" class="img-responsive" alt="" />
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </fieldset>
        </div>
    </div>
    <!-- //about -->
    <!-- services -->
    <div class="services section" id="services">
        <div class="container2">
            <h3 class="title-txt">
                <span>s</span>ervices</h3>
            <h5>we offer products and services for your
                <span>personal</span> and
                <span>professional banking</span> needs.</h5>
            <div class="col-md-5 service-left-grid">
                <div class="services-left">

                    <h4> Comenity account features </h4>
                    <p>From simple purchases to milestone decisions, you need the right combination of technology and personalized service. Our large branch network puts empowered bankers close to you, and our online and mobile solutions make banking easier than ever.</p>
                    <ul class="serv-list">
                        <li>
                            <a href="#gallery" class="abtlink scroll">view more</a>
                        </li>
                        <li>
                            <a href="#contact" class="abtlink scroll">contact us</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-7 text-center agileinfo-about-grid">
                <div class="col-md-4 col-xs-4 service-subgrids">
                    <div class="w3ls-about-grid">
                        <i class="fa fa-cc-diners-club" aria-hidden="true"></i>
                        <h6>Deposits</h6>
                        <p> You can make deposits online or at any of our branches</p>
                    </div>
                </div>

                <div class="col-md-4 col-xs-4 service-subgrids">
                    <div class="w3ls-about-grid">
                        <i class="fa fa-google-wallet" aria-hidden="true"></i>
                        <h6>loans</h6>
                        <p> With a good credit score you can apply for loan</p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 service-subgrids">
                    <div class="w3ls-about-grid">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <h6>prepaid card</h6>
                        <p>You can apply for a Comenity credit if you are 18 years and above.</p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 service-subgrids">
                    <div class="w3ls-about-grid">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        <h6>net banking</h6>
                        <p> Safe and secured online banking</p>
                    </div>
                </div>

                <div class="col-md-4 col-xs-4 service-subgrids">
                    <div class="w3ls-about-grid">
                        <i class="fa fa-inbox" aria-hidden="true"></i>
                        <h6>mcash</h6>
                        <p> mCASH allows payment for goods and services to retail merchants via the use of a mobile phone</p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 service-subgrids">
                    <div class="w3ls-about-grid">
                        <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
                        <h6>fund transfer</h6>
                        <p> Make fund transfer conveniently from anywhere around the world</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    <!-- //services -->
    <!--about manager -->
    <div class="section manager" id="manger">
        <div class="container">
            <h3 class="title-txt">
                <span>K</span>now more</h3>
            <div class="about-main">
                <div class="col-md-4 man-grid2">
                    <h5>Ensuring there's a high level of customer service.</h5>
                    <p class="about-text-w3l">Products alone don’t make a brand. People do. That’s why we invest so heavily in our Customer Care Centers. In fact, they’ve won the Certificate of Excellence from Purdue University’s BenchmarkPortal 15 consecutive times – a record for the financial services industry.</p>
                    <img src="images/sign.png" alt="" class="img-responsive" />
                    <h4 class="man-txt">Samuel C. Kelly</h4>
                    <p> Chairman of the Board</p>
                </div>
                <div class="col-md-8 man-right">
                <div class="col-md-5 col-sm-5 man-grid">
                    <ul>
                        <li>
                            <i class="fa fa-square" aria-hidden="true"></i>Giving Back
                            <p>Supporting the communities where we live and work is embedded in our values and a big part of our identity.</p>
                        </li>
                        <li>
                            <i class="fa fa-square" aria-hidden="true"></i>Comenity Customer Care
                            <p>Trusted for more than 30 years, we continue to raise the bar every time you connect with us.</p>
                        </li>

                        <li>
                            <i class="fa fa-square" aria-hidden="true"></i>A secure application process
                            <p>Your application is securely encrypted with state-of-the-art Secure Sockets Layer (SSL) software. It’s just one more way we work hard to keep your confidence.</p>
                        </li>

                    </ul>
                </div>
                <div class="w3ls-about-right col-md-7 col-sm-7">
                    <img class="img-responsive" src="images/man.jpg" alt="about-image" />
                </div>
                <div class="clearfix"></div>
            </div>
            </div>
        </div>
    </div>
    <!-- //about manager -->
   
  
    
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
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>Maece placerat eget mi
                                <p>les blandit urna urna sodales vitae pellentesq urna sodales vitaeue</p>
                            </li>
                            <li>
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>sodales blandit urna
                                <p>les blandit urna urna sodales vitae pellentesq urna sodales vitaeue</p>
                            </li>

                            <li>
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>vitae pellentesque ac
                                <p>les blandit urna urna sodales vitae pellentesq urna sodales vitaeue</p>
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