<!DOCTYPE html>
 <html lang="en">  
    
 <?php
	 include("dbCon.php");
		$con=connection();
	 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	 $_SESSION["directory"]="http://localhost/auction/";
	 if(!isset($_SESSION["isLogedIn"])){
	 $_SESSION["isLogedIn"]=false;
		 
	 }
?>
<head>
        <title>Crop Auction</title>
        <!-- META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

        <!-- FAVICON -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- BOOTSTRAP -->
       <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/bootstrap.min.css" media="all" />  
        <!-- FONT AWESOME -->
          <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/font-awesome.css" media="all" />
        <!--  STYLE -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/style.css">
        <!-- ANIMATE -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/animate.css">
        <!-- MAGNIFIC POPUP -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/magnific-popup.css">
        <!-- FLEXSLIDER -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>plugins/FlexSlider/jquery.flexslider.css">
        <!--  OWL CAROUSEL -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>plugins/owl-carousel/owl.carousel.css">
        <!-- OWL CAROUSEL THEME -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>plugins/owl-carousel/owl.theme.css">
        <!-- slick -->
        <link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>css/slick.css">
        <!-- slick-theme -->
        <link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>css/slick-theme.css">
 
 	
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/flaticon.css" media="all" />
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/owl.carousel.css" media="all" />
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/owl.theme.css" media="all" />
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/woocommerce.css">
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/slider-pro.min.css">
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/starw.css" media="all" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- WEB FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>


<body>
           <!-- Header -->
            <div class="header header-static">
                <!-- Topbar -->
                <div class="topbar">

                    <div class="container">
                        <div class="row">
                            
                            <div class="col-sm-12">
                            <div class="col-xs-3 custom-col-left form-group">
                            <div class="spa-search">
                                <form action="<?=$_SESSION["directory"]?>customer/cropsearch.php" method="post">
                                    <input type="text" placeholder="Search Crop ..." value="" class="form-control input-group-lg" style="width: 100%" name="Search">
                                    
                                </form>
                                
                            </div>
                            </div>

                                <ul class="list-inline topbar-right pull-right">
                                    <li>
                                    
                                      <?php   if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true) &&(isset($_SESSION["role"]) && $_SESSION["role"]=="0")){ ?>  
                                       <a href="<?=$_SESSION["directory"]?>customer/profile.php">Account</a>
                                     <?php  } ?>
                                    </li>
                                    
                                    <li>
                                    <?php
										if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true)){ ?>
											<a href="<?=$_SESSION["directory"]?>logout.php" onclick="return confirm_alert(this);">Logout (<?php if(isset($_SESSION["username"])){echo($_SESSION["username"]);} ?>)</a>
									<?php	}else{ ?>
									 
                                    <a href="<?=$_SESSION["directory"]?>login.php">Login / Register</a> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div><!--container-->
                </div>
                <!-- End Topbar -->

                <!-- Navbar -->
                <div class="navbar navbar-default mega-menu" role="navigation" style="background-color: white;">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <img id="logo-header" src="<?=$_SESSION["directory"]?>img/logo.png" alt="Logo" style="width: 100px; height: inherit;">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse cd-navbar-collapse">
                            <!-- Nav Menu -->
                            <ul class="nav navbar-nav">
                                <!-- Promotion -->
                                <li class="dropdown">  
                                       <a href="<?=$_SESSION["directory"]?>indexhome.php"><h1>My Home</h1></a>   
                                </li>
                            </ul>
                            <!-- End Nav Menu -->
                        </div>
                    </div>
                </div>
                <!-- End Navbar -->
            </div>
            <!-- End Header-->
            
    