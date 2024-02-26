<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Crossroad</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
  	</head>
	<body>

    <section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(/assets/images/blog-img-012.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">Cart</h1>
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
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th><input type="checkbox" id="selectAll" onclick="selectAllItems()"></th>
			      				</tr>
			    			</thead>
				    		<tbody>
							<?php foreach($myCart as $cart):?>
						      	<tr class="text-center">
						        	<td class="product-remove"><a href="<?= base_url('/removetocart/') .$cart['prod_id']?>" onclick="return confirm('Are you sure you want to remove this to your cart?')"><span class="icon-close"></span></a></td>
									<td class="image-prod"><div class="img" style="background-image:url(images/menu-2.jpg);"></div></td>
									<td class="product-name">
										<h3><?= $cart['prod_name']?></h3>
										<p>Far far away, behind the word mountains, far from the countries</p>
									</td>
									<td class="price">₱ <?= $cart['prod_mprice']?></td>
									<td class="quantity">
										<div class="input-group mb-3">
											<input type="text" name="quantity" class="quantity form-control input-number" value="<?= $cart['quantity']?>" min="1" max="100">
										</div>
									</td>
						        	<td class="total">₱ <?= $cart['total']?></td>
									<td><input type="checkbox" class="item-checkbox"></td>
						      	</tr>
								<?php endforeach;?>
						    </tbody>
						</table>
					</div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">

    						<span>Subtotal</span>
							<?php foreach($mycart as $cart):?>
    						<span>₱ <?= $cart['sum']?></span>
							<?php endforeach;?>
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
    				<p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
		</div>
	</section>

		<?php include('header.php'); ?>
		<?php include('footer.php'); ?>
		<script>
			function selectAllItems() {
			
				var selectAllCheckbox = document.getElementById("selectAll");

			
				var itemCheckboxes = document.querySelectorAll(".item-checkbox");

			
				itemCheckboxes.forEach(function (checkbox) {
					checkbox.checked = selectAllCheckbox.checked;
				});
			}
		</script>  	
</body>
</html>