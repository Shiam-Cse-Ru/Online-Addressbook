<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Addressbook</title>
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css"> 
	<link rel="stylesheet" href="css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'> 
   <link rel="icon" type="image/png"  href="images/logos.png">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php">
					<img src="images/addr.jpg" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="login.php">Login</a></li>

					<li><a href="login.php">Registration</a></li>
	

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
             <div class="heading-text">							
							<h1 class="animated flipInY delay1">Welcome to Online Addressbook</h1>
							<p>Store Your Information.</p>
						</div>
            
					<div class="fluid_container">                       
                    <div id="camera_wrap_4">
                         
                        <div data-thumb="images/slides/thumbs/img2.jpg" data-src="images/slides/img2.jpg">
                        </div>
                       
                    </div><!-- #camera_wrap_3 -->
                </div><!-- .fluid_container -->
		</div>
	</header>
	<!-- /Header -->

  
			<div class="social text-center">
				<p>To store your information you need to login first</p>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="index.php">Home</a> | 
								<a href="login.php">Login</a> |
								<a href="login.php">Registration</a> |
								
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2017.
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='js/camera.min.js'></script> 
    <script src="js/bootstrap.min.js"></script> 
	<script src="js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'images/'
			});

		});
      
	</script>
    
</body>
</html>
