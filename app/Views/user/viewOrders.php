<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Crossroad</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
		<link rel="stylesheet" href="/assets/css/preloader.css">
  	</head>
	<style>
		.myproduct{
			margin-left:100px;
		}
		.order-history-table thead th {
            background-color: #D4A059;
            color: white;
            text-align: center;
            font-weight: bold;
        }
        .order-history-table tbody td {
            text-align: center;
            vertical-align: middle;
        }
        .order-history-table img {
            width: 100px;
            height: auto;
        }
        .order-history-table h3 {
            font-weight: bold;
        }
        .order-history-table .btn-outline-primary {
            margin-top: 10px;
        }
	</style>
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
					<div class="warning"><?= session()->get('msg')?></div>
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
									<td>
										<?php if($item['orderStatus'] === 'AcceptOrder'):?>
											<form action="<?= base_url('getProdUser')?>" method="post">
												<input type="hidden" name="ProductID" value="<?= $item['prod_id']?>">
												<input type="hidden" name="orderID" value="<?= $item['orderID']?>">
												<button type="submit">Order Received</button>
											</form>
										<?php elseif($item['orderStatus'] === 'AcceptOrder'):?>
										<?php else:?>
											<h2>Please Wait</h2>
										<?php endif;?>
									</td>
						      	</tr>
								<?php endforeach;?>
						    </tbody>
						</table>
					</div>
    			</div>
    		</div>
	</section>

	<div class="container">
        <h3>Order History</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped order-history-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orderhist as $c): ?>
                        <tr>
                            <td>
                                <img src="<?="/assets/images/products/" .$c['prod_img']?>" alt="<?=$c['prod_name']?>">
                            </td>
                            <td>
                                <h3><a><?=$c['prod_name']?></a></h3>
                            </td>
                            <td>
                                <?php if($c['prod_lprice'] > 0.00): ?>
                                    Regular ₱ <?=$c['prod_mprice']?><br>Large ₱ <?=$c['prod_lprice']?>
                                <?php else: ?>
                                    ₱ <?=$c['prod_mprice']?>
                                <?php endif; ?>
                            </td>
                            <td><?=$c['quantity']?></td>
                            <td>₱ <?=$c['total']?></td>
                            <td>
                                <form action="<?= base_url('/viewProd2/') .$c['prod_id'] ?>" method="post">
                                    <?php if($c['product_status'] === 'Unavailable'): ?>
                                        <button class="btn btn-primary btn-outline-primary" type="submit" disabled>Sold Out</button>
                                    <?php else: ?>
                                        <p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('getProd/' .$c['prod_id'])?>">Order Now</a></p>
                                        <button class="btn btn-primary btn-outline-primary" type="submit">Add to cart</button>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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