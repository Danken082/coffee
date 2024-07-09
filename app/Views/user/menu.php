<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crossroad</title>
	<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
	<link rel="stylesheet" href="/assets/css/preloader.css">
</head>
<body>
	<div id="preloader"></div>
    <section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(/assets/images/hmpg2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center">
						<div class="col-md-7 col-sm-12 text-center ftco-animate">
							<h1 class="mb-3 mt-5 bread">Crossroad Menu</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section class="ftco-section">
		<div class="heading-section ftco-animate ">
			<span class="subheading" style="text-align:center; font-size:100px;">Meals</span>
		</div><br><br>
    	<div class="container">
			<div class="row">
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Breakfast Meals</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($meal as $m): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$m['prod_name'] ?></span></h3>
									<span class="price"><?=$m['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3 class="mb-5 heading-pricing ftco-animate">Sub Sandwiches</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($sand as $s): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$s['prod_name'] ?></span></h3>
									<span class="price"><?=$s['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Chicken Tenders</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($chicken as $c): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$c['prod_name'] ?></span></h3>
									<span class="price"><?=$c['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Crunchy Chicken Fillet</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($chickenfillet as $cf): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$cf['prod_name'] ?></span></h3>
									<span class="price"><?=$cf['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Pasta</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($pasta as $p): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$p['prod_name'] ?></span></h3>
									<span class="price"><?=$p['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Salads</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($salad as $s): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$s['prod_name'] ?></span></h3>
									<span class="price"><?=$s['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
				<h3 class="mb-5 heading-pricing ftco-animate">Appetizers</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($app as $a): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$a['prod_name'] ?></span></h3>
									<span class="price"><?=$a['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div><br><br>

			<div class="heading-section ftco-animate ">
				<span class="subheading" style="text-align:center; font-size:100px;">Drinks</span>
			</div><br><br>
			<div class="row">
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Hot Coffee</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<h6>Regular Large</h6>
							<?php foreach($hot as $h): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$h['prod_name'] ?></span></h3>
									<span class="price"><?=$h['prod_mprice'] ?></span>
									<span class="price"><?=$h['prod_lprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Iced Coffee</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
						<h6>Regular Large</h6>
							<?php foreach($iced as $i): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$i['prod_name'] ?></span></h3>
									<span class="price"><?=$i['prod_mprice'] ?></span>
									<span class="price"><?=$i['prod_lprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<h3 class="mb-5 heading-pricing ftco-animate">Flavored Iced Coffee</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
						<h6>Regular Large</h6>
							<?php foreach($flav as $f): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$f['prod_name'] ?></span></h3>
									<span class="price"><?=$f['prod_mprice'] ?></span>
									<span class="price"><?=$f['prod_lprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Frappe Drinks</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
						<h6>Regular Large</h6>
							<?php foreach($frap as $fr): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$fr['prod_name'] ?></span></h3>
									<span class="price"><?=$fr['prod_mprice'] ?></span>
									<span class="price"><?=$fr['prod_lprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Lemonade</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($lemon as $l): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$l['prod_name'] ?></span></h3>
									<span class="price"><?=$l['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3 class="mb-5 heading-pricing ftco-animate">Others</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
						<h6>Regular</h6>
							<?php foreach($other as $o): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$o['prod_name'] ?></span></h3>
									<span class="price"><?=$o['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div><br><br>
			</div>
    	</div>
    </section>

	<?php include('header.php'); ?>
	<?php include('footer.php'); ?>

	<script src="/assets/js/preloader.js"></script>
  	</body>
</html>