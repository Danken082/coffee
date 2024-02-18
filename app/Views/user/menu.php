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
								<h3>Tawiran Calapan City</h3>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
								<h3>Open Monday - Sunday</h3>
								<p>10:00 AM - 10:00 PM</p>
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