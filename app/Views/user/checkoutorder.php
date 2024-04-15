<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crossroad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
	<link rel="stylesheet" href="/assets/css/preloader.css">
  </head>
  <body>
	<style>
		.categ{
			color: white;
		}
		.tagcloud{
			color: white;
		}
	</style>

	<div id="preloader"></div>
    <section class="home-slider owl-carousel">
      	<div class="slider-item" style="background-image: url(/assets/images/hmpg4.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">Checkout</h1>
					</div>
				</div>
			</div>
      	</div>
    </section>

    <section class="ftco-section">
		<div class="container">
			<div class="row">
               
				<div class="col-xl-8 ftco-animate">
					<form action="#" class="billing-form ftco-bg-dark p-3 p-md-5">
						<h3 class="mb-4 ordered-billing">Products Ordered</h3>
                        
						<div class="row align-items-end">
							<div class="col-md-6">
								<div class="form-group">
									
								</div>
							</div>
						</div>
						<h3 class="mb-4 billing-heading">Billing Details</h3>
						<div class="row align-items-end">
							<div class="col-md-6">
								<div class="form-group">
                                
						
									<label for="firstname">First Name</label>
									<input type="text" disabled name="FirstName" class="form-control" value="<?= session()->get('FirstName') ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastname">Last Name</label>
									<input type="text" disabled name="LastName" class="form-control" value="<?= session()->get('LastName')?>">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="streetaddress">Street Address</label>
									<input type="text" class="form-control" placeholder="House number and street name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="towncity">Town / City</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="postcodezip">Postcode / ZIP *</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" name="ContactNo"  value="<?= session()->get('ContactNo')?>" class="form-control" placeholder="Phone Number">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress">Email Address</label>
									<input type="text" disabled name="Email"class="form-control" value="<?= session()->get('email') ?>">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group mt-4">
									<div class="radio">
										<label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										<label><input type="radio" name="optradio"> Ship to different address</label>
									</div>
								</div>
                			</div>
	            		</div>
					</form>
	          
				    <div class="row mt-5 pt-3 d-flex">
	          			<div class="col-md-6 d-flex">
							<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
								<h3 class="billing-heading mb-4">Cart Total</h3>
								<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$17.60</span>
		    					</p>
							</div>
	          			</div>
						<div class="col-md-6">
							<div class="cart-detail ftco-bg-dark p-3 p-md-4">
								<h3 class="billing-heading mb-4">Payment Method</h3>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Gcash</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Paymaya</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
										   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="checkbox">
										   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
										</div>
									</div>
								</div>
								<p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
							</div>
	          			</div>
	          		</div>
          		</div>

				<div class="col-xl-4 sidebar ftco-animate">
					<div class="sidebar-box ftco-animate">
						<div class="categ">
							<h2>Categories</h2><br>
							<h3 style="text-align:center;">Meals</h3>
							<li><a>Appetizer</a></li>
							<li><a>Pasta</a></li>
							<li><a>Rice Meals</a></li>
							<li><a>Salad</a></li>
							<li><a>Soup</a></li>
							<li><a>Sandwiches</a></li>
							<h3 style="text-align:center;">Drinks</h3>
							<li><a>Hot Coffee</a></li>
							<li><a>Iced Coffee</a></li>
							<li><a>Flavored Iced Coffee</a></li>
							<li><a>Non Coffee Frappe</a></li>
							<li><a>Coffee Frappe</a></li>
							<li><a>Others</a></li>
						</div>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3>Tag Cloud</h3>
						<div class="tagcloud">
							<a class="tag-cloud-link">Dish</a>
							<a class="tag-cloud-link">Menu</a>
							<a class="tag-cloud-link">Food</a>
							<a class="tag-cloud-link">Sweet</a>
							<a class="tag-cloud-link">Tasty</a>
							<a class="tag-cloud-link">Meals</a>
							<a class="tag-cloud-link">Delicious</a>
							<a class="tag-cloud-link">Desserts</a>
							<a class="tag-cloud-link">Drinks</a>
						</div>
					</div>
				</div>
        	</div>
      	</div>
    </section> 
    
	<?php include('header.php'); ?>
	<?php include('footer.php'); ?>

	<script>
		var loader = document.getElementById("preloader");

		window.addEventListener("load", function () {
			setTimeout(function () {
				loader.style.display = "none";
			}, 1500);
		});
	</script>
  </body>
</html>