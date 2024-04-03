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
	<?php if(session()->getFlashdata('msg')):?>
	<div class="alert alert-warning">
		<?= session()->getFlashdata('msg') ?>

	</div>
	<?php endif;?>

	<form action="<?= base_url('CartController/placeOrder')?>" method="post">
	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
					
	    				<table class="table">
			    			<thead class="thead-primary">
			      				<tr class="text-center">
									<th><input type="checkbox" id="selectAll" onclick="selectAllItems()"></th>
									<th>Image</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th>&nbsp;</th>
			      				</tr>
			    			</thead>
				    		<tbody>
						
							<?php foreach($myCart as $item):?>
								
						      	<tr class="text-center">
								  	<td><input type="checkbox" name="items[]" value= "<?= $item['id']?>" class="item-checkbox"></td>
									<td class="image-prod"><img class="menu-img img mb-4" src="<?="/assets/images/" .$item['prod_img']?>">
									<td class="product-name">
										<h3><?= $item['prod_name']?></h3>
									</td>
									<?php if($item['size'] == 'Medium')?>
									<td class="price">₱ <?= $item['prod_mprice']?></td>
							
									<td class="quantity">
										<div class="input-group mb-3">
											<input type="number" name="quantity" class="quantity form-control input-number" value="<?= $item['quantity']?>" min="1" max="100">
										</div>
									</td>
						        	<td class="total">₱ <?= $item['total']?></td>
									<td class="product-remove"><a href="<?= base_url('/removetocart/') .$item['id']?>" onclick="return confirm('Are you sure you want to remove this to your cart?')"><span class="icon-close"></span></a></td>
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
    						<span>₱ 0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>₱ 3.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>₱ 17.60</span>
    					</p>
    				</div>
					<a href="<?= site_url("user/checkout"); ?>" class="btn btn-primary py-3 px-4 button">Proceed to Checkout</a>
    			</div>
				
    		</div>
		</div>
	</section>
	</form>
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