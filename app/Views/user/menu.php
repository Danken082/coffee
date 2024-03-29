<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crossroad</title>
	<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
</head>
<body>

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
					<h3 class="mb-5 heading-pricing ftco-animate">Rice Meals</h3>
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
					<h3 class="mb-5 heading-pricing ftco-animate">Appetizer</h3>
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
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Salad</h3>
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
					<h3 class="mb-5 heading-pricing ftco-animate">Soup</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
							<?php foreach($soup as $s): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$s['prod_name'] ?></span></h3>
									<span class="price"><?=$s['prod_mprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3 class="mb-5 heading-pricing ftco-animate">French Sub Sandwiches</h3>
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
					<h3 class="mb-5 heading-pricing ftco-animate">Non Coffee Frappe</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
						<h6>Regular Large</h6>
							<?php foreach($non as $n): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$n['prod_name'] ?></span></h3>
									<span class="price"><?=$n['prod_mprice'] ?></span>
									<span class="price"><?=$n['prod_lprice'] ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Coffee Frappe</h3>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="desc pl-3">
						<h6>Regular Large</h6>
							<?php foreach($coffee as $c): ?>
								<div class="d-flex text align-items-center">
									<h3><span><?=$c['prod_name'] ?></span></h3>
									<span class="price"><?=$c['prod_mprice'] ?></span>
									<span class="price"><?=$c['prod_lprice'] ?></span>
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

  	</body>
</html>