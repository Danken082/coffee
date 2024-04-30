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
    <div id="preloader"></div>
    <section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(/assets/images/bgimg.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">My Orders</h1>
					</div>
				</div>
			</div>
		</div>
    </section>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
					
	    				<table class="table">
			    			<thead class="thead-primary">
			      				<tr class="text-center">
									<th>Image</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th>Status</th>
									<th>&nbsp;</th>
			      				</tr>
			    			</thead>
				    		<tbody>
						
							<?php foreach($order as $item):?>
								
						      	<tr class="text-center">
								  	<td class="image-prod"><img class="menu-img img mb-4" src="<?="/assets/images/products/" .$item['prod_img']?>">
									<td class="product-name">
										<h3><?= $item['prod_name']?></h3>
									</td>

									
									<td class="price">₱ <?= $item['prod_mprice']?></td>
							
									<td class="quantity">
										<div class="input-group mb-3">
											<input type="number" name="quantity" disabled class="quantity form-control input-number" value="<?= $item['quantity']?>" min="1" max="100">
										</div>
									</td>
									
						        	<td class="total">₱ <?= $item['total']?></td>
									<td class="quantity">
										<div class="input-group mb-3">
										<h4><?= $item['orderStatus']?></h4>
										</div>
									</td>
						      	</tr>
								<?php endforeach;?>
						    </tbody>
						</table>
				
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