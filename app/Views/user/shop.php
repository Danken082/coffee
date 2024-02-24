<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crossroad</title>
	<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
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
								<a class="nav-link" id="v-pills-9-tab" data-toggle="pill" href="#v-pills-9" role="tab" aria-controls="v-pills-9" aria-selected="false">Flavored Iced Coffee</a>
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
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$a['prod_img']?>">
														<h3><a><?=$a['prod_name']?></a></h3>
														<p class="price"><span>₱ <?= $a['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/') .$a['prod_id'] ?>">Add to cart</a></p>
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
												<?php foreach($pasta as $p): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$p['prod_img']?>">
														<h3><a><?=$p['prod_name']?></a></h3>
														<p class="price"><span>₱ <?=$p['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $p['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($meal as $m): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$m['prod_img']?>">
														<h3><a><?=$m['prod_name']?></a></h3>
														<p class="price"><span>₱ <?= $m['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary"href="<?= base_url('/viewProd/'). $m['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($salad as $s): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$s['prod_img']?>">
														<h3><a><?=$s['prod_name']?></a></h3>
														<p class="price"><span>₱ <?=$s['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $s['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($soup as $s): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$s['prod_img']?>">
														<h3><a><?=$s['prod_name']?></a></h3>
														<p class="price"><span>₱ <?=$s['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $s['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($sand as $s): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$s['prod_img']?>">
														<h3><a><?=$s['prod_name']?></a></h3>
														<p class="price"><span>₱ <?=$s['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $s['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($hot as $h): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$h['prod_img']?>">
														<h3><a><?=$h['prod_name']?></a></h3>
														<p class="price"><span>₱ <?=$h['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary"href="<?= base_url('/viewProd/'). $h['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-8" role="tabpanel" aria-labelledby="v-pills-8-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($iced as $i): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$i['prod_img']?>">
														<h3><a><?=$i['prod_name']?></a></h3>
														<p class="price"><span>Regular ₱ <?=$i['prod_mprice'] ?><br>Large ₱ <?=$i['prod_lprice'] ?> </span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $i['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-9" role="tabpanel" aria-labelledby="v-pills-9-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($flav as $f): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$f['prod_img']?>">
														<h3><a><?=$f['prod_name']?></a></h3>
														<p class="price"><span>Regular ₱ <?=$f['prod_mprice'] ?><br>Large ₱ <?=$f['prod_lprice'] ?> </span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $f['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-10" role="tabpanel" aria-labelledby="v-pills-10-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($non as $n): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$n['prod_img']?>">
														<h3><a><?=$n['prod_name']?></a></h3>
														<p class="price"><span>Regular ₱ <?=$n['prod_mprice'] ?><br>Large ₱ <?=$n['prod_lprice'] ?> </span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $n['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-11" role="tabpanel" aria-labelledby="v-pills-11-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($coffee as $c): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$c['prod_img']?>">
														<h3><a><?=$c['prod_name']?></a></h3>
														<p class="price"><span>Regular ₱ <?=$c['prod_mprice'] ?><br>Large ₱ <?=$c['prod_lprice'] ?> </span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $c['prod_id'] ?>">Add to cart</a></p>
													</div>
												<?php endforeach; ?>	
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-12" role="tabpanel" aria-labelledby="v-pills-12-tab">
									<div class="row">
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<?php foreach($other as $o): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/" .$o['prod_img']?>">
														<h3><a><?=$o['prod_name']?></a></h3>
														<p class="price"><span>₱ <?=$o['prod_mprice'] ?></span></p>
														<p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
														<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $o['prod_id'] ?>">Add to cart</a></p>
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

	<?php include('header.php'); ?>
	<?php include('footer.php'); ?>
	
  </body>
</html>