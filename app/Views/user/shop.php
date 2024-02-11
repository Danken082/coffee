<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Croassroad</title>
  </head>
  <body>

    <section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(/assets/user/images/bg3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">Order Online</h1>
					</div>
				</div>
			</div>
		</div>
    </section>

	<section class="ftco-menu">
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading" style="font-size:90px; color:white;">Our Products</span>
				</div>
			</div>
			<div class="row d-md-flex">
				<div class="col-lg-12 ftco-animate p-md-5">
					<div class="row">
						<div class="col-md-12 nav-link-wrap mb-5">
							<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Meals</a>
								<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>
								<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Sandwiches</a>
							</div>
						</div>
						<div class="col-md-12 d-flex align-items-center">
							<div class="tab-content ftco-animate" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a class="menu-img img mb-4" style="background-image: url(/assets/images/meal1.jpg);"></a>
												<?php foreach($meal as $m): ?>
													<div class="text">
														<h3><a><?=$m['prod_name'] ?></a></h3>
														<p class="price"><span><?=$m['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a class="menu-img img mb-4" style="background-image: url(/assets/images/coffee1.png);"></a>
												<div class="text">
													<h3><a>Cookies and Cream</a></h3>
													<p class="price"><span>₱ 150</span></p>
													<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a class="menu-img img mb-4" style="background-image: url(/assets/images/icedcoffee.jpg);"></a>
												<div class="text">
													<h3><a>Iced Caramel Latte</a></h3>
													<p class="price"><span>₱ 130</span></p>
													<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a class="menu-img img mb-4" style="background-image: url(/assets/images/hotcofee.jpg);"></a>
												<div class="text">
													<h3><a>Hot Capuccino</a></h3>
													<p class="price"><span>₱ 80</span></p>
													<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a class="menu-img img mb-4" style="background-image: url(/assets/images/sandwich1.jpg);"></a>
												<div class="text">
													<h3><a>Cheesy Pepperoni</a></h3>
													<p class="price"><span>₱ 180</span></p>
													<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a class="menu-img img mb-4" style="background-image: url(/assets/images/sandwich2.jpg);"></a>
												<div class="text">
													<h3><a>Tuna Sandwich</a></h3>
													<p class="price"><span>₱ 170</span></p>
													<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a class="menu-img img mb-4" style="background-image: url(/assets/images/sandwich3.jpg);"></a>
												<div class="text">
													<h3><a>Beef Burger</a></h3>
													<p class="price"><span>₱ 160</span></p>
													<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
  </body>
</html>