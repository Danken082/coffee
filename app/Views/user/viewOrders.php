<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Crossroad</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
		<link rel="stylesheet" href="/assets/css/preloader.css">
		<link rel="stylesheet" href="/assets/css/vieworder.css">
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
                    <div class="order-list">
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
                                    <td class="image-prod"><img class="menu-img img mb-4" src="<?="/assets/images/products/" .$item['prod_img']?>"></td>
                                    <td class="product-name">
                                        <h3><?= $item['prod_name']?></h3>
                                    </td>
                                    <td class="price">₱ <?= $item['prod_mprice']?></td>
									<td class="quantity"><?= $item['quantity']?></td>
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
        </div>
    </section>

    <div class="order-history-container">
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
                            <td><img src="<?="/assets/images/products/" .$c['prod_img']?>" alt="<?=$c['prod_name']?>"></td>
                            <td><h3><a><?=$c['prod_name']?></a></h3></td>
                            <td class="price">
                                <?php if($c['prod_lprice'] > 0.00): ?>
                                    Regular ₱ <?=$c['prod_mprice']?><br>Large ₱ <?=$c['prod_lprice']?>
                                <?php else: ?>
                                    ₱ <?=$c['prod_mprice']?>
                                <?php endif; ?>
                            </td>
                            <td class="quantity"><?=$c['quantity']?></td>
                            <td class="total">₱ <?=$c['total']?></td>
                            <td>
                                <form action="<?= base_url('/viewProd2/') .$c['prod_id'] ?>" method="post">
                                    <?php if($c['product_status'] === 'Unavailable'): ?>
                                        <button class="btn btn-primary btn-outline-primary" type="submit" disabled>Sold Out</button>
                                    <?php else: ?>
                                        <p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('getProd/' .$c['prod_id'])?>">Order Again</a></p>
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

	<?php include('viewOrdersmobile.php'); ?>
	
	<?php include('mainheader.php'); ?>
	<?php include('footer.php'); ?>

	<script src="/assets/js/preloader.js"></script>
</body>
</html>