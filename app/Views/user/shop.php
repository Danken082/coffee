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
								<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Appetizer</a>
								<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Pasta</a>
								<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Rice Meals</a>
								<a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Salad</a>
								<a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Soup</a>
								<a class="nav-link" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Sandwiches</a>
								<a class="nav-link" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="false">Hot Coffee</a>
								<a class="nav-link" id="v-pills-8-tab" data-toggle="pill" href="#v-pills-8" role="tab" aria-controls="v-pills-8" aria-selected="false">Iced Coffee</a>
								<a class="nav-link" id="v-pills-9-tab" data-toggle="pill" href="#v-pills-9" role="tab" aria-controls="v-pills-9" aria-selected="false">Flavored Iced Coffe</a>
								<a class="nav-link" id="v-pills-10-tab" data-toggle="pill" href="#v-pills-10" role="tab" aria-controls="v-pills-10" aria-selected="false">Non Coffee Frappe</a>
								<a class="nav-link" id="v-pills-11-tab" data-toggle="pill" href="#v-pills-11" role="tab" aria-controls="v-pills-11" aria-selected="false">Coffee Frappe</a>
								<a class="nav-link" id="v-pills-12-tab" data-toggle="pill" href="#v-pills-12" role="tab" aria-controls="v-pills-12" aria-selected="false">Others</a>
							</div>
						</div>
						<div class="col-md-12 d-flex align-items-center">
							<div class="tab-content ftco-animate" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($app as $a): ?>
													<img class="menu-img img mb-4" src="<?="/assets/images/" .$a['prod_img']?>" height="300px" width="330px" alt="pictures">
													<div class="text">
														<h3><a><?=$a['prod_name']?></a></h3>
														<p class="price"><span><?=$a['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($pasta as $p): ?>
													<img class="menu-img img mb-4" src="<?="/assets/images/" .$p['prod_img']?>" height="300px" width="330px" alt="pictures">
													<div class="text">
														<h3><a><?=$p['prod_name']?></a></h3>
														<p class="price"><span><?=$p['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade show active" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($meal as $m): ?>
													<img class="menu-img img mb-4" src="<?="/assets/images/" .$m['prod_img']?>" height="300px" width="330px" alt="pictures">
													<div class="text">
														<h3><a><?=$m['prod_name']?></a></h3>
														<p class="price"><span><?=$m['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
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