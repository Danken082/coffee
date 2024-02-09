<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Crossroad</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		</head>
		<body>	
			<section class="home-slider owl-carousel">
				<div class="slider-item" style="background-image: url(/assets/user/images/bg1.jpg);">
					<div class="overlay"></div>
					<div class="container">
						<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
							<div class="col-md-8 col-sm-12 text-center ftco-animate">
								<span class="subheading">Welcome</span>
								<h1 class="mb-4">The Best Coffee Testing Experience</h1>
								<p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
							</div>
						</div>
					</div>
				</div>

				<div class="slider-item" style="background-image: url(/assets/user/images/bg2.jpg);">
					<div class="overlay"></div>
					<div class="container">
						<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
							<div class="col-md-8 col-sm-12 text-center ftco-animate">
								<span class="subheading">Welcome</span>
								<h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
								<p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
							</div>
						</div>
					</div>
				</div>

				<div class="slider-item" style="background-image: url(/assets/user/images/bg3.jpg);">
					<div class="overlay"></div>
					<div class="container">
						<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
							<div class="col-md-8 col-sm-12 text-center ftco-animate">
								<span class="subheading">Welcome</span>
								<h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
								<p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
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
										<h3>000 (123) 456 7890</h3>
										<p>A small river named Duden flows by their place and supplies.</p>
									</div>
								</div>
								<div class="col-md-4 d-flex ftco-animate">
									<div class="icon"><span class="icon-my_location"></span></div>
									<div class="text">
										<h3>198 West 21th Street</h3>
										<p>	203 Fake St. Mountain View, San Francisco, California, USA</p>
									</div>
								</div>
								<div class="col-md-4 d-flex ftco-animate">
									<div class="icon"><span class="icon-clock-o"></span></div>
									<div class="text">
										<h3>Open Monday-Friday</h3>
										<p>8:00am - 9:00pm</p>
									</div>
								</div>
							</div>
						</div>
						<div class="book p-4">
							<h3>Book a Table</h3>
							<form action="#" class="appointment-form">
								<div class="d-md-flex">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="First Name">
									</div>
									<div class="form-group ml-md-4">
										<input type="text" class="form-control" placeholder="Last Name">
									</div>
								</div>
								<div class="d-md-flex">
									<div class="form-group">
										<div class="input-wrap">
											<div class="icon"><span class="ion-md-calendar"></span></div>
											<input type="text" class="form-control appointment_date" placeholder="Date">
										</div>
		    						</div>
									<div class="form-group ml-md-4">
										<div class="input-wrap">
											<div class="icon"><span class="ion-ios-clock"></span></div>
											<input type="text" class="form-control appointment_time" placeholder="Time">
										</div>
		    						</div>
									<div class="form-group ml-md-4">
										<input type="text" class="form-control" placeholder="Phone">
									</div>
								</div>
								<div class="d-md-flex">
									<div class="form-group">
										<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
									</div>
									<div class="form-group ml-md-4">
										<input type="submit" value="Appointment" class="btn btn-white py-3 px-4">
									</div>
								</div>
	    					</form>
	    				</div>
    				</div>
    			</div>
    		</section>

			<?php 
				$page = isset($_GET['page']) ?$_GET['page'] : "header";
				include $page.'.php';
			?> 
			<?php 
				$page = isset($_GET['page']) ?$_GET['page'] : "footer";
				include $page.'.php';
			?> 
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  	</body>
</html>