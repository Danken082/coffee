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

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <form action="<?= base_url('CartController/placeOrder')?>" method="post">
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
                                    <td><input type="checkbox" name="items[]" value="<?= $item['id']?>" class="item-checkbox"></td>
                                    <td class="image-prod"><img class="menu-img img mb-4" src="<?="/assets/images/products/" .$item['prod_img']?>"></td>
                                    <td class="product-name">
                                        <h3><?= $item['prod_name']?></h3>
                                    </td>
                                    <?php if($item['size'] === 'Medium'):?>
                                        <td class="price">₱ <?= $item['prod_mprice']?></td>
                                    <?php elseif($item['size'] === 'Large'):?>
                                        <td class="price">₱ <?= $item['prod_lprice']?></td>
                                    <?php else:?>
                                        <td class="price">Check your size</td>
                                    <?php endif;?>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="number" disabled name="quantity" class="quantity form-control input-number" value="<?= $item['quantity']?>" min="1" max="100">
                                            <form action="<?= base_url('addQuantity/' .$item['id'])?>" method="post" class="update-quantity-form">
                                                <input type="hidden" name="mprice" value="<?= $item['prod_mprice']?>">
                                                <input type="hidden" name="lprice" value="<?= $item['prod_lprice']?>">
                                                <input type="hidden" name="cartID" value="<?= $item['id']?>">
                                                <input type="number" min="1" name="newquantity" id="quantity-<?= $item['id']?>" class="quantity form-control input-number">
                                                <small><button type="submit">Add</button></small>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="total">₱ <?= $item['total']?></td>
                                    <td class="product-remove"><a href="<?= base_url('/removetocart/') .$item['id']?>" onclick="return confirm('Are you sure you want to remove this from your cart?')"><span class="icon-close"></span></a></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="row justify-content-end">
                            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                                <div class="cart-total mb-3">
                                    <h3>Cart Totals</h3>
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span id="cart-total">₱ 0.00</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Delivery</span>
                                        <span>₱ 50.00</span>
                                    </p>
                                    <select name="paymentMethod" class="paymentMethodSelector">
                                        <option selected disabled>Select Type Of Payment</option>
                                        <option value="COD">COD (CASH ON DELIVERY)</option>
                                        <option value="Use_Online_Payment">E-Payment</option>
                                    </select>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span id="grand-total">₱ 50.00</span>
                                    </p>
                                    <input type="hidden" name="total" id="total-amount">
                                </div>
                                <button type="submit" id="placeorder" class="btn btn-primary">Place to Checkout</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('mainheader.php'); ?>
<?php include('footer.php'); ?>

<script>
function selectAllItems() {
    var selectAllCheckbox = document.getElementById("selectAll");
    var itemCheckboxes = document.querySelectorAll(".item-checkbox");
    itemCheckboxes.forEach(function (checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
    calculateTotal();
}

document.querySelectorAll('.item-checkbox').forEach(function (checkbox) {
    checkbox.addEventListener('change', calculateTotal);
});

function calculateTotal() {
    var total = 0;
    document.querySelectorAll('.item-checkbox:checked').forEach(function (checkbox) {
        var row = checkbox.closest('tr');
        var itemTotal = parseFloat(row.querySelector('.total').innerText.replace('₱', '').trim());
        total += itemTotal;
    });
    document.getElementById('cart-total').innerText = '₱ ' + total.toFixed(2);
    document.getElementById('total-amount').value = total.toFixed(2);
    var grandTotal = total + 50; // Assuming delivery charge is ₱50
    document.getElementById('grand-total').innerText = '₱ ' + grandTotal.toFixed(2);
    checkPaymentMethod();
}

function checkPaymentMethod() {
    var paymentMethod = document.querySelector('.paymentMethodSelector').value;
    var placeOrderButton = document.getElementById('placeorder');
    if (!paymentMethod || paymentMethod === 'Select Type Of Payment') {
        placeOrderButton.disabled = true;
    } else {
        placeOrderButton.disabled = false;
    }
}

window.addEventListener("load", function () {
    setTimeout(function () {
        document.getElementById("preloader").style.display = "none";
    }, 1500);
    // Call checkPaymentMethod on page load
    checkPaymentMethod();
});

document.querySelectorAll('input[name="newquantity"]').forEach(function (input) {
    input.addEventListener("input", function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});

document.querySelector('.paymentMethodSelector').addEventListener('change', checkPaymentMethod);
</script>
</body>
</html>
