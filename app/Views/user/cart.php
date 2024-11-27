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
                                    <th></th>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Total Quantity</th>
                                    <th>Total Price</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($myCart as $index => $item):?>
                                <tr class="text-center">
                                    <td><input type="hidden" hidden name="item[]" value="<?= $item['id'] ?>" class="item-checkbox"></td>
                                    <td><input type="checkbox" name="items[]" value="<?= $index ?>" class="item-checkbox"></td>
                                    <td class="image-prod"><img class="menu-img img mb-4" src="<?="/assets/images/products/" .$item['prod_img']?>"></td>
                                    <td class="product-name">
                                        <h3><?= $item['prod_name']?></h3>
                                    </td>
                                    <td>
                                        <?php if($item['prod_lprice'] > 0): ?>
                                            <select name="size" class="size-selector" data-index="<?= $index ?>" data-medium-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>" onchange="updateSizePrice(this)">
                                                <option value="Medium" <?= $item['size'] === 'Medium' ? 'selected' : '' ?>>Medium</option>
                                                <option value="Large" <?= $item['size'] === 'Large' ? 'selected' : '' ?>>Large</option>
                                            </select>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </td>
                                    <?php $price = $item['size'] === 'Medium' ? $item['prod_mprice'] : ($item['size'] === 'Large' ? $item['prod_lprice'] : 0); ?>
                                    <td class="price" id="price-<?= $index ?>">₱ <?= number_format($price, 2) ?></td>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <button type="button" class="decrement" data-index="<?= $index ?>" onclick="decreaseQuantity(this)">-</button>
                                            <input type="number" disabled name="quantity[]" class="quantity form-control input-number" value="<?= $item['quantity']?>" min="1" max="100" id="quantity-<?= $index ?>">
                                            <button type="button" class="increment" data-index="<?= $index ?>" onclick="increaseQuantity(this)">+</button>
                                        </div>
                                    </td>
                                    <td class="total">₱ <span id="total-price-<?= $index ?>">   </span></td>
                            
            <input type="hidden" name="totalPrice[]"  value="" id="hidden-total-price-<?= $index ?>">

                                   

                                    <td class="product-remove">
                                        <a href="<?= base_url('/removetocart/') .$item['id']?>" onclick="return confirm('Are you sure you want to remove this from your cart?')">
                                            <span class="icon-close"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php include('cartmobile.php'); ?>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/assets/js/preloader.js"></script>
<script src="/assets/js/cart/payment.js"></script>
<script src="/assets/js/cart/totalquantity.js"></script>
<script src="/assets/js/cart/checkbox.js"></script>
<script src="/assets/js/cart/updateprice.js"></script>


<script>
    document.querySelector('form').addEventListener('submit', function(event) {
    
    const checkedItems = Array.from(document.querySelectorAll('input[name="items[]"]:checked'));
    
    if (checkedItems.length === 0) {
        alert('Please select at least one item.');
        event.preventDefault(); 
        return;
    }

    const itemInputs = document.querySelectorAll('input[name="item[]"]');

    const selectedItems = [];
    itemInputs.forEach((input, index) => {

        if (checkedItems.some(checkbox => checkbox.value == index)) {
            selectedItems.push(input.value); // Add item to selectedItems array
        }
    });

    const hiddenItemInput = document.createElement('input');
    hiddenItemInput.type = 'hidden';
    hiddenItemInput.name = 'selectedItems';  // The name of the input to send to the backend
    hiddenItemInput.value = JSON.stringify(selectedItems); // Send the array as a JSON string
    document.querySelector('form').appendChild(hiddenItemInput);
});

</script>



</body>
</html>
