<?php  
include 'db.php';
include 'config.php';

if (isset($_POST['trackingsub'])) {
    $trackId = trim($_POST['trackId']);
    $select = mysqli_query($link, "SELECT * FROM tracking WHERE tracking_number = '$trackId' ");
    if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
        $senders_name = $row['sender_name'];  
         $senders_contact = $row['sender_contact'];  
         $senders_mail = $row['sender_email'];  
         $senders_address = $row['sender_address'];
         $receivers_name = $row['receiver_name'];  
         $receivers_contact = $row['receiver_contact'];  
         $receivers_mail = $row['receiver_email'];  
         $receivers_address = $row['receiver_address'];
         $statuss = $row['status'];  
         $dispatch_l = $row['dispatch_location'];  
         $dispatchh = $row['dispatch_date'];  
         $deliveryy = $row['delivery_date'];
         $current_location = $row['current_location'];
         $desc = $row['pdesc'];
         $carrier = $row['carrier'];
         $carrier_ref = $row['carrier_ref'];
         $weight = $row['weight'];
         $payment_mode = $row['payment_mode'];
         $ship_mode = $row['ship_mode'];
         $quantity = $row['quantity'];
         $delivery_time = $row['delivery_time'];
         $image = $row['image'];
         $destination = $row['destination'];

    }else{
      echo "<script>alert('Invalid Tracking Number');window.location.href = 'index.html'; </script>";
    }
  }
  // else{
  //   echo "<script>window.location.href = 'index.html'; </script>";
  // }
?>

<!DOCTYPE html>
<html>

<!-- Mirrored from nauthemes.net/html/Crest Courier/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2023 06:23:29 GMT -->
<head>
<meta charset="utf-8">
<title>Crest Courier  | Track</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="css/track.css">
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
 	<!-- Main Header / Header Style Two -->
    <header class="main-header header-style-two">
		<div class="auto-container">
			<div class="header-inner">
				<!--Header Top-->
				<div class="header-top">
					<div class="clearfix">
						
						<!--Top Right-->
						<div class="top-right">
						
							<!-- Right List -->
							<ul class="right-list">
								<li><span class="icon flaticon-mail"></span>info@crestcourier.com</li>
								<li><span class="icon flaticon-phone-contact"></span>+444 987-321-300</li>
							</ul>
							
						</div>
						
					</div>
					
				</div>
			
				<!--Header-Upper-->
				<div class="header-upper">
					
					<div class="clearfix">
						
						<div class="pull-left logo-box">
							<div class="logo"><a href="index.html"><img src="images/logo-2.png" alt="" title=""></a></div>
						</div>
						
						<div class="pull-right upper-right">
							
							<!--Header Lower-->
							<div class="header-lower">
								
								
									<div class="nav-outer clearfix">
										<!-- Main Menu -->
										<nav class="main-menu navbar-expand-md">
											<div class="navbar-header">
												<!-- Toggle Button -->    	
												<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												</button>
											</div>
											
											<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
												<ul class="navigation clearfix">
													<li>
														<div id="google_translate_element"></div>

                        <script type="text/javascript">
                        function googleTranslateElementInit() {
                          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                        }
                        </script>

                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                         <style>
                            #google_translate_element {
                          /*color: transparent;*/
                        }
                        #google_translate_element a {
                          display: none;
                        }

                        div.goog-te-gadget {
                          /*color: transparent !important;*/
                        }
                            </style>
													</li>
													<li>
														<a href="index.html">Home</a>
													</li>
													<li><a href="about.html">About</a></li>
													<li><a href="services.html">Services</a></li>
													<li><a href="contact.html">Contact</a></li>
													<li class="current"><a href="track.php">Track & Trace</a></li>
												</ul>
											</div>
										</nav>
										
										<!-- Main Menu End-->
										<div class="outer-box clearfix">
										
											<!--Option Box-->
											<div class="option-box">
												
												<!--Search Box-->
												<div class="search-box-outer">
													<div class="dropdown">
														<button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-route"></span></button>
														<ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
															<li class="panel-outer">
																<div class="form-container">
																	<form method="post" action="Crest Courier/blog.html">
																		<div class="form-group">
																			<input type="search" name="field-name" value="" placeholder="Track Your Shipment" required>
																			<button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
																		</div>
																	</form>
																</div>
															</li>
														</ul>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								
							</div>
							<!--End Header Lower-->
							
						</div>
						
					</div>
					
				</div>
			<!--End Header Upper-->
			</div>
        </div>
		
		<!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="index.html" class="img-responsive"><img src="images/logo-small-2.png" alt="" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
								<li>
									<a href="index.html">Home</a>
								</li>
								<li><a href="about.html">About</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li class="current"><a href="track.php">Track & Trace</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->
    
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/12.jpg);">
    	<div class="auto-container">
        	<h2>Track & Trace</h2>
			<div class="separater"></div>
        </div>
    </section>
    
    <!--Breadcrumb-->
    <div class="breadcrumb-outer">
    	<div class="auto-container">
        	<ul class="bread-crumb text-center">
            	<li><a href="index.html">Home</a> <span>/</span></li>
                <li>Track & Trace</li>
            </ul>
        </div>
    </div>
    <!--End Page Title-->
	
	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!--Content Side-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                	<div class="track-section">
						<!-- Sec Title Two -->
						<div class="sec-title-two sec-title">
							<h2>Track & <span>Trace Shipment</span></h2>
							<div class="separater"></div>
						</div>
						<div class="track-form-two">
							<form method="post" action="track.php">
								<div class="form-group">
									<label>Enter Tracking Number Here</label>
								</div>
								<div class="form-group">
									<input type="text" name="trackId" placeholder="Enter your tracking number e.g CRG-11-XXXX">
									<button type="submit" name="trackingsub" class="theme-btn submit-btn">Track Your Shipment</button>
								</div>
							</form>
						</div>
	
					<?php  
						if (isset($_POST['trackingsub'])) {
					?>
						<!-- Tracking Info -->
						<div class="tracking-info-detail">
							<?php  
								$qq = mysqli_query($link, "SELECT * FROM track_update WHERE track_num = '$trackId' ");
								if (mysqli_num_rows($qq) > 0) {
									while ($data = mysqli_fetch_assoc($qq)) {

									switch ($data['status']) {
										case 'Active':
											$class = "style-two";
											break;
										case 'Inactive':
											$class = "style-2";
											break;
										case 'Picked Up':
											$class = "style-3";
											break;
										case 'Arrived':
											$class = "style-4";
											break;
										case 'Delivered':
											$class = "style-5";
											break;
										case 'Departed':
											$class = "style-6";
											break;
										case 'On hold':
											$class = "style-7";
											break;
										default:
											$class = "style-three";
											break;
									}
							?>
							<div class="tracking-box">
								<div class="tracking-time-box">
									<div class="tracking-time"><?php echo date('F dS, Y', strtotime($data['date'])); ?></div>
									<span><?php echo date("G:i A", strtotime($data['time'])); ?></span>
								</div>
								<div class="tracking-location <?php echo $class ?>">
									<span class="dott"></span>
									<strong><?php echo $data['status'] ?> in <?php echo $data['current_location'] ?> </strong>
									<?php echo $data['note'] ?>
								</div>
							</div>
							<?php }
								} ?>
						
						</div>
                        
						<div class="container" style='display: block'>
						    <center><img src="images/logo-small-2.png" width="150px" style='margin: 10px 0'><br>
						      <img src="./images/qrcode.png">
						      <p style='font-weight: bold; padding: 10px 0'><?php echo $trackId ?></p>
						    </center>
						    <div class="grid" >
						      <article>
						        <h5 >Shipper Information</h5>
						        <hr>
						        <ul style="font-size: 13px;">
						          <li>Name: <?php echo $senders_name ?></li>
						          <li>Address: <?php echo $senders_address ?></li>
						          <li>Phone Number: <?php echo $senders_contact ?></li>
						          <li>Email: <?php echo $senders_mail ?></li>
						        </ul>
						      </article>

						      <article>
						        <h5>Receiver Information</h5>
						        <hr>
						        <ul style="font-size: 13px;">
						          <li>Name: <?php echo $receivers_name ?></li>
						          <li>Address: <?php echo $receivers_address ?></li>
						          <li>Phone Number: <?php echo $receivers_contact ?></li>
						          <li>Email: <?php echo $receivers_mail ?></li>
						        </ul>
						      </article>
						    </div>

						    <div style='background: grey; color: white; padding: 10px; font-size: 13px; text-align: center; border-radius: 3px'>SHIPMENT STATUS - <?php echo $statuss ?></div>
						    <h6 style='padding: 10px 0; margin: 0 20px'>Shipment Information</h6>
						    <!-- <hr> -->
						    <div class="grid-two" style="font-size: 13px;">
						      <article>
						        <b>Origin: </b><br>
						        <p><?php echo $dispatch_l ?></p>
						      </article>

						      <article>
						        <b>Package: </b><br>
						        <p><?php echo $desc ?></p>
						      </article>

						      <article>
						        <b>Status: </b><br>
						        <p><?php echo $statuss ?></p>
						      </article>

						      <article>
						        <b>Destination: </b><br>
						        <p><?php echo $destination ?></p>
						      </article>

						      <article>
						        <b>Carrier: </b><br>
						        <p><?php echo $carrier ?></p>
						      </article>

						      <article>
						        <b>Type of Shipment: </b><br>
						        <p><?php echo $ship_mode ?></p>
						      </article>

						      <article>
						        <b>Weight: </b><br>
						        <p><?php echo $weight ?></p>
						      </article>

						      <article>
						        <b>Shipment Mode: </b><br>
						        <p><?php echo $ship_mode ?></p>
						      </article>

						      <article>
						        <b>Carrier Reference No.: </b><br>
						        <p><?php echo $carrier_ref ?></p>
						      </article>

						      <article>
						        <b>Product: </b><br>
						        <p><?php echo $desc ?> </p>
						      </article>

						      <article>
						        <b>Qty: </b><br>
						        <p><?php echo $quantity ?></p>
						      </article>

						      <article>
						        <b>Payment Mode: </b><br>
						        <p><?php echo $payment_mode ?></p>
						      </article>

						      <article>
						        <b>Total Freight: </b><br>
						        <p><?php echo $quantity ?></p>
						      </article>

						      <article>
						        <b>Expected Delivery Date: </b><br>
						        <p><?php echo $deliveryy ?></p>
						      </article>

						      <article>
						        <b>Departure Date: </b><br>
						        <p><?php echo $dispatchh ?></p>
						      </article>

						      <article>
						        <b>Delivery Time: </b><br>
						        <p><?php echo $delivery_time ?></p>
						      </article>

						    </div>
						  </div>
						    <div class="container">
						        <center><img src="uploads/<?php echo $image ?>"> </center>
						    </div>
						<?php  
							if ($show_map == "Yes") {
						?>
						<!--Map Outer-->
						<div class="row d-flex align-items-stretch">
		                    <div class="col-md-12 col-lg-12 col-xl-12 ">
		                        <iframe class="map" src="https://maps.google.com/maps?q=<?php echo $current_location == "" ? $dispatch_l : $current_location ?>&amp;t=k&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" style="border:0; width: 100%; height: 527px;"></iframe>
		                    </div>
		                </div>
						<?php } ?>

						<?php  
							if ($allow_print == "Yes") {
						?>
						
			                <center><a href="receipt.php?tnum=<?php echo $trackId ?>" class="btn btn-primary">Print Receipt</a></center>
			           
			        <?php } ?>

			    <?php } ?>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>


	
	<!--Main Footer-->
	<!--Main Footer-->
    <footer class="main-footer style-two" style="background-image:url(images/background/7.png)">
    	<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
                    <!--Column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">
						
                        	<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
									<h2><span class="icon fa fa-thumbs-o-up"></span>Useful Links</h2>
									
									<div class="row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<ul class="footer-list">
												<li><a href="#">About us</a></li>
												<li><a href="#">Services</a></li>
												<li><a href="#">Track & trace</a></li>
											</ul>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<ul class="footer-list">
												<li><a href="#">Company</a></li>
												<li><a href="#">Contact us</a></li>
											</ul>
										</div>
									</div>
									
								</div>
							</div>
							
						</div>
					</div>
					
					<!--Column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">
						
                        	<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget mail-widget">
									<h2><span class="icon fa fa-envelope-o"></span>Mailing List</h2>
									<div class="text">Sign up for our mailing list to get latest updates and offers.</div>
									<!-- Email Form -->
									<div class="email-form">
										<form method="post" action="Crest Courier/quote.html">
											<div class="form-group clearfix">
												<input type="email" name="email" value="" placeholder="Email address">
												<button type="submit" class="theme-btn submit-btn"><span class="icon fa fa-check"></span></button>
											</div>
										</form>
									</div>
								</div>
							</div>
							
							<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget about-widget">
									<h2><span class="icon fa fa-user"></span>About Us</h2>
									<div class="text">Crest Courier is a global supplier of transport and logistics solutions</div>
									<div class="phone-number">0044 123 456</div>
									<div class="about-email">info@crestcourier.com</div>
									<!--Social Box-->
									<ul class="social-icon-one">
										<li><a href="#"><span class="fa fa-twitter"></span></a></li>
										<li><a href="#"><span class="fa fa-facebook"></span></a></li>
										<li><a href="#"><span class="fa fa-linkedin"></span></a></li>
										<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
										<li><a href="#"><span class="fa fa-instagram"></span></a></li>
										<li><a href="#"><span class="fa fa-youtube"></span></a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="copyright">Crest Courier &copy; 2023 / ALL RIGHTS RESERVED</div>
		</div>
		
	</footer>
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/appear.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/script.js"></script>

</body>

<!-- Mirrored from nauthemes.net/html/Crest Courier/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2023 06:23:48 GMT -->
</html>