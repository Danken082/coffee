<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Crossroads</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
		<link rel="stylesheet" href="/assets/css/preloader.css">
		</head>

		<body>	
			<div id="preloader"></div>
			<section class="home-slider owl-carousel">
				<div class="slider-item" style="background-image: url(/assets/images/bgimg1.jpg);">
					<div class="overlay"></div>
					<div class="container">
						<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
							<div class="col-md-8 col-sm-12 text-center ftco-animate">
								<span class="subheading">Welcome</span>
								<h1 class="mb-4">The Best Coffee Testing Experience</h1>
								<p><a href="<?= site_url("/shop"); ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="<?= site_url("/menu"); ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
							</div>
						</div>
					</div>
				</div>

				<div class="slider-item" style="background-image: url(/assets/images/bgimg4.jpg);">
					<div class="overlay"></div>
					<div class="container">
						<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
							<div class="col-md-8 col-sm-12 text-center ftco-animate">
								<span class="subheading">Welcome</span>
								<h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
								<p><a href="<?= site_url("/shop"); ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="<?= site_url("/menu"); ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
							</div>
						</div>
					</div>
				</div>

				<div class="slider-item" style="background-image: url(/assets/images/bgimg5.jpg);">
					<div class="overlay"></div>
					<div class="container">
						<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
							<div class="col-md-8 col-sm-12 text-center ftco-animate">
								<span class="subheading">Welcome</span>
								<h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
								<p><a href="<?= site_url("/shop"); ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="<?= site_url("/menu"); ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="ftco-intro">
				<div class="container-wrap">
					<div class="wrap d-md-flex align-items-xl-end">
						<div class="info">
							<div class="row no-gutters">
								<div class="col-md-4 d-flex ftco-animate">
									<div class="icon"><span class="icon-phone"></span></div>
									<div class="text">
										<h3>0917 890 1067</h3>
									</div>
								</div>
								<div class="col-md-4 d-flex ftco-animate">
									<div class="icon"><span class="icon-my_location"></span></div>
									<div class="text">
										<h3>Tawiran Calapan City Oriental Mindoro</h3>
									</div>
								</div>
								<div class="col-md-4 d-flex ftco-animate">
									<div class="icon"><span class="icon-clock-o"></span></div>
									<div class="text">
										<h3>Open Monday - Sunday</h3>
										<h3>10:00 AM - 10:00 PM</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="book p-4">
							<h3>Book a Table</h3>
							<form action="<?= base_url('/login')?>" class="appointment-form">
								<div class="d-md-flex">
									<div class="form-group">
										<input type="text" name="LastName" class="form-control" placeholder="Lastname">
									</div>
									<div class="form-group ml-md-4">
										<input type="text" name="FirstName" class="form-control" placeholder="Firstname">
									</div>
									<div class="form-group ml-md-4">
										<input type="text" name="Email"class="form-control" placeholder="Email">
									</div>
								</div>
								<div class="d-md-flex">
									<div class="form-group">
										<div class="input-wrap">
											<label for="table reservation" style="color:white;">Date & Time</label>
											<input type="datetime-local" name="apppointmentDate" class="form-control datetimepicker">
										</div>
		    						</div>
									<div class="form-group ml-md-4">
										<input type="text" name="ContactNo" class="form-control" placeholder="Phone Number">
									</div>
									<div class="form-group ml-md-4 selector">
										<select name="HCustomer" class="booktable form-control custom-select" align-text="center" style="font:black;">
											<option selected disabled>Count Of Persons</option>
											<option value="1-3">1-3 Persons</option>
											<option value="1-8">1-8 Persons</option>
											<option value="1-13">1-13 Persons</option>
											<option value="1-18">1-18 Persons</option>
											<option value="1-23">1-23 Persons</option>
											<option value="1-30">1-30 Persons</option>
											
										</select>
									</div>
								</div>
				
								<div class="d-md-flex">
									<div class="form-group">
										<textarea name="message" max-length="60" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
									</div>
									<div class="form-group ml-md-4">
										<input type="submit" value="Login to Reserve" class="btn btn-white py-3 px-4">
									</div>
								</div>
	    					</form>
	    				</div>
    				</div>
    			</div>
    		</section>

			<section class="ftco-about d-md-flex">
				<div class="one-half img" style="background-image: url(/assets/images/bgimg2.jpg);"></div>
				<div class="one-half ftco-animate">
					<div class="overlap">
						<div class="heading-section ftco-animate ">
							<span class="subheading">Discover</span>
							<h2 class="mb-4">Our Story</h2>
						</div>
						<div>
							<p style="color:white">The Crossroad Coffee and Deli draws its inspiration from the concept of intersecting paths, which is reflected in its name. 
								This establishment came into being during the height of the pandemic, a challenging time for many. Despite the difficult circumstances, it quickly gained popularity, 
								largely due to the exceptional quality and taste of the items on its menu. The café offers a diverse range of delicious options that cater to various tastes, making it a 
								favorite spot for many.
								The story of its creation and subsequent success highlights the resilience and creativity that can flourish even in the most trying times.
							</p>
						</div>
					</div>
				</div>
			</section>

			<section class="ftco-section ftco-services">
				<div class="container">
					<div class="row">
						<div class="col-md-4 ftco-animate">
							<div class="media d-block text-center block-6 services">
								<div class="icon d-flex justify-content-center align-items-center mb-5">
									<span class="flaticon-choices"></span>
								</div>
								<div class="media-body">
									<h3 class="heading">Easy to Order</h3>
									<p>Experience the inviting aroma of freshly brewed coffee and create your own mouthwatering sandwich or salad at Crossroads Coffee and Deli. 
										Our friendly staff is ready to make your cravings a delicious reality.</p>
								</div>
							</div>      
						</div>
						<div class="col-md-4 ftco-animate">
							<div class="media d-block text-center block-6 services">
								<div class="icon d-flex justify-content-center align-items-center mb-5">
									<span class="flaticon-delivery-truck"></span>
								</div>
								<div class="media-body">
									<h3 class="heading">Fastest Delivery</h3>
									<p>Swiftly savor the aromatic brews and craft your personalized sandwich or salad at Crossroads Coffee and
										 Deli – where fast delivery meets flavorful satisfaction!</p>
								</div>
							</div>      
						</div>
						<div class="col-md-4 ftco-animate">
							<div class="media d-block text-center block-6 services">
								<div class="icon d-flex justify-content-center align-items-center mb-5">
									<span class="flaticon-coffee-bean"></span>
								</div>
								<div class="media-body">
									<h3 class="heading">Quality Coffee</h3>
									<p>Experience the pinnacle of coffee perfection at Crossroads Coffee and Deli, where each cup is a testament to our unwavering commitment to quality.</p>
								</div>
							</div>    
						</div>
					</div>
				</div>
			</section>

			<section class="ftco-section">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6 pr-md-5">
							<div class="heading-section text-md-right ftco-animate">
								<span class="subheading">Discover</span>
								<h2 class="mb-4">Our Menu</h2>
								<p><a href="<?= site_url("user/menu"); ?>" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
							</div>
    					</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="menu-entry">
									<a class="img" style="background-image: url(/assets/images/products/hotmocha.jpg);"></a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="menu-entry mt-lg-4">
									<a class="img" style="background-image: url(/assets/images/products/chickenparmegiana.jpg);"></a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="menu-entry">
									<a class="img" style="background-image: url(/assets/images/products/crabandcornsoup.jpg);"></a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="menu-entry mt-lg-4">
									<a class="img" style="background-image: url(/assets/images/products/javafrap.jpg);"></a>
								</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</section>

			<section class="ftco-section">
				<div class="container">
					<div class="row justify-content-center mb-5 pb-3">
						<div class="col-md-7 heading-section ftco-animate text-center">
							<span class="subheading">Discover</span>
							<h2 class="mb-4">Our Coffee Best Seller</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="menu-entry">
								<a class="img" style="background-image: url(/assets/images/products/icedcookiesncream.jpg);"></a>
								<div class="text text-center pt-4">
									<h3><a>Cookies and Cream</a></h3>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="menu-entry">
								<a class="img" style="background-image: url(/assets/images/products/saltedcaramelfrap.jpg);"></a>
								<div class="text text-center pt-4">
									<h3><a>Caramel</a></h3>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="menu-entry">
								<a class="img" style="background-image: url(/assets/images/products/javafrap.jpg);"></a>
								<div class="text text-center pt-4">
									<h3><a>Java Chip</a></h3>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="menu-entry">
								<a class="img" style="background-image: url(/assets/images/products/hotcappuccino.jpg);"></a>
								<div class="text text-center pt-4">
									<h3><a>Hot Capuccino</a></h3>
								</div>
							</div>
						</div>
        			</div>
    			</div>
    		</section>

			<section class="ftco-gallery">
				<div class="container-wrap">
					<div class="row justify-content-center mb-5">
						<div class="col-md-7 heading-section text-center ftco-animate">
							<span class="subheading">Discover</span>
							<h2 class="mb-4">Our Dear Customers</h2>
						</div>
					</div>
					<div class="row no-gutters">
						<div class="col-md-3 ftco-animate">
							<a href="https://www.facebook.com/crossroadcafedeli" class="gallery img d-flex align-items-center" style="background-image: url(/assets/images/pic1.jpg);">
								<div class="icon mb-4 d-flex align-items-center justify-content-center">
									<span class="icon-search"></span>
								</div>
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a href="https://www.facebook.com/crossroadcafedeli" class="gallery img d-flex align-items-center" style="background-image: url(/assets/images/pic2.jpg);">
								<div class="icon mb-4 d-flex align-items-center justify-content-center">
									<span class="icon-search"></span>
								</div>
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a href="https://www.facebook.com/crossroadcafedeli" class="gallery img d-flex align-items-center" style="background-image: url(/assets/images/pic3.jpg);">
								<div class="icon mb-4 d-flex align-items-center justify-content-center">
									<span class="icon-search"></span>
								</div>
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a href="https://www.facebook.com/crossroadcafedeli" class="gallery img d-flex align-items-center" style="background-image: url(/assets/images/pic4.jpg);">
								<div class="icon mb-4 d-flex align-items-center justify-content-center">
									<span class="icon-search"></span>
								</div>
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a href="https://www.facebook.com/crossroadcafedeli" class="gallery img d-flex align-items-center" style="background-image: url(/assets/images/pic5.jpg);">
								<div class="icon mb-4 d-flex align-items-center justify-content-center">
									<span class="icon-search"></span>
								</div>
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a href="https://www.facebook.com/crossroadcafedeli" class="gallery img d-flex align-items-center" style="background-image: url(/assets/images/pic6.jpg);">
								<div class="icon mb-4 d-flex align-items-center justify-content-center">
									<span class="icon-search"></span>
								</div>
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a href="https://www.facebook.com/crossroadcafedeli" class="gallery img d-flex align-items-center" style="background-image: url(/assets/images/pic7.jpg);">
								<div class="icon mb-4 d-flex align-items-center justify-content-center">
									<span class="icon-search"></span>
								</div>
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a href="https://www.facebook.com/crossroadcafedeli" class="gallery img d-flex align-items-center" style="background-image: url(/assets/images/pic8.jpg);">
								<div class="icon mb-4 d-flex align-items-center justify-content-center">
									<span class="icon-search"></span>
								</div>
							</a>
						</div>
        			</div>
    			</div>
    		</section>

			<section class="ftco-appointment">
				<div class="overlay"></div><br><br>
				<div class="row justify-content-center mb-5 pb-3">
					<div class="col-md-7 heading-section ftco-animate text-center">
						<span class="subheading">Discover</span>
						<h2 class="mb-4">Where we Are</h2>
					</div>
				</div>
				<div id="map" style="height: 500px;"></div>
			</section>

			<?php include('header.php'); ?>
			<?php include('footer.php'); ?>

			<script src="/assets/js/preloader.js"></script>
  	</body>
</html>