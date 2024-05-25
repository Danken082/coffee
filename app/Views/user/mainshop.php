<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crossroad</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
	<link rel="stylesheet" href="/assets/css/preloader.css">
  </head>
  <body>
  	<div id="preloader"></div>
    <section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(/assets/images/hmpg4.jpg);" data-stellar-background-ratio="0.5">
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
								<a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Sandwiches</a>
								<a class="nav-link" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Soup</a>
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$a['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$a['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$a['prod_desc']?></p></div>
														<p class="price"><span>₱ <?= $a['prod_mprice'] ?></span></p>
														<form action="<?= base_url('/viewProd1/') .$a['prod_id'] ?>" method="post">
															<?php if($a['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderMeal/' .$a['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderMeal/' .$a['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button> <br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$a['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$p['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$p['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$p['prod_desc']?></p></div>
														<p class="price"><span>₱ <?=$p['prod_mprice'] ?></span></p>
														<form action="<?= base_url('/viewProd1/') .$p['prod_id'] ?>" method="post">
															<?php if($p['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$p['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderMeal/' .$p['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$p['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$m['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$m['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$m['prod_desc']?></p></div>
														<p class="price"><span>₱ <?= $m['prod_mprice'] ?></span></p>
														<form action="<?= base_url('/viewProd1/') .$m['prod_id'] ?>" method="post">
															<?php if($m['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$m['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderMeal/' .$m['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$m['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$s['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$s['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$s['prod_desc']?></p></div>
														<p class="price"><span>₱ <?=$s['prod_mprice'] ?></span></p>
														<form action="<?= base_url('/viewProd1/') .$s['prod_id'] ?>" method="post">
															<?php if($s['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$s['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderMeal/' .$s['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$s['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>													
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
												<?php foreach($sand as $s): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$s['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$s['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$s['prod_desc']?></p></div>
														<p class="price"><span>₱ <?=$s['prod_mprice'] ?></span></p>
														<form action="<?= base_url('/viewProd1/') .$s['prod_id'] ?>" method="post">
															<?php if($s['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$s['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderMeal/' .$s['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$s['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>
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
												<?php foreach($soup as $s): ?>
													<div class="text">
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$s['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$s['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$s['prod_desc']?></p></div>
														<p class="price"><span>₱ <?=$s['prod_mprice'] ?></span></p>
														<form action="<?= base_url('/viewProd1/') .$s['prod_id'] ?>" method="post">
															<?php if($s['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$s['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary"href="<?= base_url('OrderMeal/' .$s['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$s['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>													
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$h['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$h['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$h['prod_desc']?></p></div>
														<p class="price"><span>₱ <?=$h['prod_mprice'] ?></span></p>
														<form action="<?= base_url('/viewProd2/') .$h['prod_id'] ?>" method="post">
															<?php if($h['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$h['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderDrink/' .$h['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$h['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$i['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$i['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$i['prod_desc']?></p></div>
														<p class="price"><span>Regular ₱ <?=$i['prod_mprice'] ?><br>Large ₱ <?=$i['prod_lprice'] ?> </span></p>
														<form action="<?= base_url('/viewProd2/') .$i['prod_id'] ?>" method="post">
															<?php if($i['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$i['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderDrink/' .$i['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$i['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>													
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$f['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$f['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$f['prod_desc']?></p></div>
														<p class="price"><span>Regular ₱ <?=$f['prod_mprice'] ?><br>Large ₱ <?=$f['prod_lprice'] ?> </span></p>
														<form action="<?= base_url('/viewProd2/') .$f['prod_id'] ?>" method="post">
															<?php if($f['product_status'] === 'Unavailable'):?>
															<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
															<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$f['prod_id'])?>">View Feedbacks</a></p>
														<?php else:?>
															<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderDrink/' .$f['prod_id'])?>">Order Now</a></p>
															<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
															<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$f['prod_id'])?>">View Feedbacks</a></p>
														<?php endif;?>
														</form>													
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$n['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$n['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$n['prod_desc']?></p></div>
														<p class="price"><span>Regular ₱ <?=$n['prod_mprice'] ?><br>Large ₱ <?=$n['prod_lprice'] ?> </span></p>
														<form action="<?= base_url('/viewProd2/') .$n['prod_id'] ?>" method="post">
															<?php if($n['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$n['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderDrink/' .$n['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit">Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$n['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>													
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$c['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$c['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$c['prod_desc']?></p></div>
														<p class="price"><span>Regular ₱ <?=$c['prod_mprice'] ?><br>Large ₱ <?=$c['prod_lprice'] ?> </span></p>
														<form action="<?= base_url('/viewProd2/') .$c['prod_id'] ?>" method="post">
															<?php if($c['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$c['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderDrink/' .$c['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$c['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>												
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
														<img class="menu-img img mb-4" src="<?="/assets/images/products/" .$o['prod_img']?>">
														<h3 style="font-weight:bold;"><a><?=$o['prod_name']?></a></h3>
														<div class="d-block" style="color:white;"><p><?=$o['prod_desc']?></p></div>
														<p class="price"><span>₱ <?=$o['prod_mprice'] ?></span></p>
														<form action="<?= base_url('/viewProd2/') .$o['prod_id'] ?>" method="post">
															<?php if($o['product_status'] === 'Unavailable'):?>
																<button class="btn btn-primary btn-outline-primary"type="submit" disabled>Sold Out</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$o['prod_id'])?>">View Feedbacks</a></p>
															<?php else:?>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('OrderDrink/' .$o['prod_id'])?>">Order Now</a></p>
																<button class="btn btn-primary btn-outline-primary"type="submit" >Add to cart</button><br><br>
																<p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('viewByFeedback/' .$o['prod_id'])?>">View Feedbacks</a></p>
															<?php endif;?>
														</form>													
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

	<?php include('mainheader.php'); ?>
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