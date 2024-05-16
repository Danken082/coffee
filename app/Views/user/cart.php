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
	<section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(/assets/images/bgimg.jpg);" data-stellar-background-ratio="0.5">
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
		<div id="preloader"></div>
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
									<th>Total Quantity</th>
									<th>Total Price</th>
									<th>&nbsp;</th>
			      				</tr>
			    			</thead>
				    		<tbody>
							<?php foreach($myCart as $item):?>
						      	<tr class="text-center">
								  	<td><input type="checkbox" name="items[]" value= "<?= $item['id']?>" class="item-checkbox"></td>
									<td class="image-prod"><img class="menu-img img mb-4" src="<?="/assets/images/products/" .$item['prod_img']?>">
									<td class="product-name">
										<h3><?= $item['prod_name']?></h3>
									</td>
									
									<?php if($item['size'] === 'Medium'):?>
									<td class="price">₱ <?= $item['prod_mprice']?></td>
									<?php elseif($item['size'] === 'Large'):?>
									<td class="price">₱ <?= $item['prod_lprice']?></td>
									<?php else:?>
									<td class="price"><?php echo('chech your size')?></td>
									<?php endif;?>
									<td class="quantity">
										<div class="input-group mb-3">

											<input type="number" disabled name="quantity" class="quantity form-control input-number" value="<?= $item['quantity']?>" min="1" max="100">
												<form action="<?= base_url('addQuantity/' .$item['id'])?>" method="post">
												<input type="hidden" name="mprice" value="<?= $item['prod_mprice']?>">
													<input type="hidden" name="lprice" value="<?= $item['prod_lprice']?>">
												<input type="hidden" name="cartID" value= "<?= $item['id']?>" class="item-checkbox">
												<input type="number" min="1" name="newquantity" id="quantity" class="quantity form-control input-number">
												<small><button type="submit">add</button></small>	
											</form>
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
    						<span>₱ </span>
    					</p>

    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>₱ <?= $cart['sum']?></span>
    					</p>
    				</div>
					<button type="submit" class="btn btn-primary">Place to Checkout</button>
    			</div>
    		</div>  
		</div>
	</section>
	</form>
		<?php include('mainheader.php'); ?>
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
		<script>
			var loader = document.getElementById("preloader");
			window.addEventListener("load", function () {
				setTimeout(function () {
					loader.style.display = "none";
				}, 1500);
			});
		</script>
		<script>
			var inputs = document.getElementById("quantity");

        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>

</body>
</html>