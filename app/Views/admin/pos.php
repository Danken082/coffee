<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale</title>
    <link href="/assets/css/pos.css" rel="stylesheet" />
    <link href="https://fontawesome.com/"/>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <a href="<?= base_url('/adminhistory')?>" class="back-button">Back</a>
        <div class="container">
            <div class="products-container">
                <div class="search-bar-container">
                    <input type="text" id="search" class="search-bar" placeholder="Search products...">
                    <i class="fa fas fa-search search-icon"></i>
                </div>
                <h2>Products</h2>
                <div class="category-tabs">
                        <button class="category-tab active" data-category="all">All</button>
                        <button class="category-tab" data-category="app">Appetizer</button>
                        <button class="category-tab" data-category="pasta">Pasta</button>
                        <button class="category-tab" data-category="meal">Rice Meal</button>
                        <button class="category-tab" data-category="salad">Salad</button>
                        <button class="category-tab" data-category="sand">Sandwich</button>
                        <button class="category-tab" data-category="soup">Soup</button>
                        <button class="category-tab" data-category="hot">Hot Coffee</button>
                        <button class="category-tab" data-category="iced">Iced Coffee</button>
                        <button class="category-tab" data-category="flav">Flavored Iced Coffee</button>
                        <button class="category-tab" data-category="non">Non Coffee Frappe</button>
                        <button class="category-tab" data-category="coffee">Coffee Frappe</button>
                        <button class="category-tab" data-category="other">Others</button>
                    </div>
                    <div class="products">
                        <?php foreach($app as $item): ?>
                            <div class="box" data-category="app">
                                <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                                <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                <h3><a><?= $item['prod_name'] ?></a></h3>
                                <?php if($item['prod_lprice'] == 0.00):?> 
                                    <p class="price">
                                        <span>₱ <?= $item['prod_mprice'] ?> </span>
                                    </p>
                                <?php else:?>
                                    <p class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?></span>
                                    </p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach($pasta as $item): ?>
                            <div class="box" data-category="pasta">
                            <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                                <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                <h3><a><?= $item['prod_name'] ?></a></h3>
                                <?php if($item['prod_lprice'] == 0.00):?> 
                                    <p class="price">
                                        <span> ₱ <?= $item['prod_mprice'] ?> </span>
                                    </p>
                                <?php else:?>
                                    <p class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?></span>
                                    </p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach($meal as $item): ?>
                            <div class="box" data-category="meal">
                            <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                                <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                <h3><a><?= $item['prod_name'] ?></a></h3>
                                <?php if($item['prod_lprice'] == 0.00):?> 
                                    <p class="price">
                                        <span> ₱ <?= $item['prod_mprice'] ?> </span>
                                    </p>
                                <?php else:?>
                                    <p class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?></span>
                                    </p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                    <?php foreach($salad as $item): ?>

                        <div class="box" data-category="salad">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?></span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($sand as $item): ?>
                        <div class="box" data-category="sand">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?></span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($soup as $item): ?>
                        <div class="box" data-category="soup">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?></span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($hot as $item): ?>
                        <div class="box" data-category="hot">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <div class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?> </span><br>
                                        <span>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </div>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($iced as $item): ?>
                        <div class="box" data-category="iced">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <div class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?> </span><br>
                                        <span>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </div>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($flav as $item): ?>
                        <div class="box" data-category="flav">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <div class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?> </span><br>
                                        <span>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </div>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($non as $item): ?>
                        <div class="box" data-category="non">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <div class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?> </span><br>
                                        <span>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </div>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($coffee as $item): ?>
                        <div class="box" data-category="coffee">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <div class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?> </span><br>
                                        <span>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </div>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($other as $item): ?>
                        <div class="box" data-category="other">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <div class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                    </div>
                                    <p class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?></span>
                                    </p>
                                <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="no-product-message" style="display: none;">
                    There's no such product here.
                </div>
            </div>
            <div class="orders-container">
                <div class="box">
                    <h2>Customer Orders</h2>
                    <table class="order-list" id="order-list">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="total">
                        <h3>Total Quantity: <span id="total-quantity">0</span></h3>
                        <h3>Total Price: <span id="total-price">₱ 0.00</span></h3>
                    </div>
                    <div class="payment-container">
                        <input type="number" id="payment-input" placeholder="Enter payment amount"><br><br>
                        <button id="pay-button">Pay</button><br><br>
                        <div id="change-output"></div>
                    </div>
                    <button id="save-transaction-button">Save Transaction</button>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/js/pos.js"></script>
</body>
</html>