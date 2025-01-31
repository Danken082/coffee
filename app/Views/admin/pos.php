
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Point of Sale</title>
    <link href="/assets/css/updatecss/pos.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="assets/images/POSicon.png">
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
                        <button class="category-tab" data-category="meal">Breakfast Meal</button>
                        <button class="category-tab" data-category="chicken">Chicken Tenders</button>
                        <button class="category-tab" data-category="chickenfillet">Crunchy Chicken Fillet</button>
                        <button class="category-tab" data-category="pasta">Pasta</button>
                        <button class="category-tab" data-category="salad">Salad</button>
                        <button class="category-tab" data-category="sand">Sub Sandwich</button>
                        <button class="category-tab" data-category="hot">Hot Coffee</button>
                        <button class="category-tab" data-category="iced">Iced Coffee</button>
                        <button class="category-tab" data-category="flav">Flavored Iced Coffee</button>
                        <button class="category-tab" data-category="frap">Frappe Drinks</button>
                        <button class="category-tab" data-category="lemon">Lemonade</button>
                        <button class="category-tab" data-category="other">Others</button>
                    </div>
                    <div class="products">
                        <?php foreach($app as $item): ?>
                            <div class="box" data-category="app">
                                <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                                <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                        <?php foreach($meal as $item): ?>
                            <div class="box" data-category="meal">
                            <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                        <?php foreach($chicken as $item): ?>
                            <div class="box" data-category="chicken">
                            <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                        <?php foreach($chickenfillet as $item): ?>
                            <div class="box" data-category="chickenfillet">
                            <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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

                                <select name="" id="">
                                    <option value="" disabled selected>Flavor</option>
                                <?php foreach($flavor as $flvr):?>
                                    
                                    <option value="<?= $flvr['Flavor_Name'];?>"><?= $flvr['Flavor_Name'];?></option>
                                <?php endforeach;?>
                                </select>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach($pasta as $item): ?>
                            <div class="box" data-category="pasta">
                            <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                            <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                            <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                        <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                        <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                        <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                    <?php foreach($frap as $item): ?>
                        <div class="box" data-category="frap">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                        <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                    <?php foreach($lemon as $item): ?>
                        <div class="box" data-category="lemon">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                        <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                        <input type="hidden" class="prodCateg" value="<?= $item['prod_categ']?>">
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
                    <select name="SelectDineTake" class="SelectDineTake">
                        <option value="Dine In">Dine In</option>
                        <option value="Take Out">Take Out</option>
                    </select>
                    <select name="SelectPayment" class="SelectPayment">
                        <option value="Cash">Cash</option>
                        <option value="Gcash">Gcash</option>
                    </select>
                    <table class="order-list" id="order-list">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
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
                        <!-- <button id="pay-button">Pay</button><br><br> -->
                        <div id="change-output"></div>
                    </div>
                    <button class="btn btn-primary" id="previewPOSOrders"onclick="showOrderPreview()" disabled>Preview Orders</button>
    
                </div>
            </div>
        </div>
    </main>

    
   <!-- Order Preview Modal -->
<div id="orderModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Crossroad Coffee Deli</h3>
            <p>Tawiran Calapan City, Oriental Mindoro</p>
            <hr>
            <p><strong>Receipt</strong></p>
            <p class="receipt-date"><?= date('F j, Y, g:i a', strtotime(date('Y-m-d H:i:s'))) ?></p>
        </div>
        <div class="modal-body">
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="modal-order-list">
                    <!-- Dynamic order list will be inserted here -->
                </tbody>
            </table>
            <div class="text-end">
                <span id="modal-order-total">Grand Total: ₱0.00</span>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeOrderPreview()">Close</button>
            <button class="btn btn-primary" id="save-transaction-button" onclick="window.print()">Print</button>
        </div>
    </div>
</div>

    <script src="/assets/js/pos.js"></script>

    
</body>
</html>
