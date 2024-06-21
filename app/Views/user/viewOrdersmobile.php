    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="order-list-mobile">
                        <div class="warning"><?= session()->get('msg')?></div>
                        <div id="order-history-items">
                            <h2>My Orders</h32>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach($order as $item): ?>
                                    <div class="cart-item-mobile">
                                        <img src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                        <div class="details-mobile">
                                            <div class="product-name"><?= $item['prod_name'] ?></div>
                                            <div class="price">₱ <?= number_format($item['total'], 2) ?></div>
                                            <div class="quantity">Quantity: <?= $item['quantity'] ?></div>
                                            <div class="status">Status: <?= $item['orderStatus'] ?></div>
                                        </div>
                                        <div class="order-btn">
                                            <?php if ($item['orderStatus'] === 'AcceptOrder'): ?>
                                                <form action="<?= base_url('getProdUser') ?>" method="post">
                                                    <input type="hidden" name="ProductID" value="<?= $item['prod_id'] ?>">
                                                    <input type="hidden" name="orderID" value="<?= $item['orderID'] ?>">
                                                    <button class="btn btn-primary btn-outline-primary" type="submit">Order Received</button>
                                                </form>
                                            <?php else: ?>
                                                <h3>Please Wait</h3>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="order-history-mobile">
        <h2>Order History</h2>
        <div class="row">
            <div class="col-md-12">
                <?php foreach($orderhist as $c): ?>
                <div class="cart-item-mobile">
                    <img src="<?= "/assets/images/products/" . $c['prod_img'] ?>" alt="<?= $c['prod_name'] ?>">
                    <div class="details-mobile">
                        <div class="product-name"><?= $c['prod_name'] ?></div>
                        <div class="price">₱ <?= number_format($c['total'], 2) ?></div>
                        <div class="quantity">Quantity: <?= $c['quantity'] ?></div>
                        <div class="status">Status: <?= $c['orderStatus'] ?></div>
                    </div>
                    <div class="order-btn">
                        <form action="<?= base_url('/viewProd2/') . $c['prod_id'] ?>" method="post">
                            <?php if ($c['product_status'] === 'Unavailable'): ?>
                                <button class="btn btn-primary btn-outline-primary" type="submit" disabled>Sold Out</button>
                            <?php else: ?>
                                <p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('getProd/' . $c['prod_id']) ?>">Order Again</a></p>
                                <button class="btn btn-primary btn-outline-primary" type="submit">Add to cart</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>