<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link href="/assets/css/pos.css" rel="stylesheet" />
    <link href="https://fontawesome.com/"/>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <style>
        .orders-container {
            overflow-y:scroll;
        }
        td {
    max-width: 200px; /* Adjust the max-width as needed */
    word-wrap: break-word;
    overflow-wrap: break-word;
        }

        .total-price-cell,
        .quantity-cell,
        .price-cell {
            max-width: 100px; /* Adjust the max-width as needed */
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

    </style>
</head>
<body>
    <main>
        <br>
        <a href="<?= base_url('/mainhome')?>" style="background-color: transparent; color:black; font-size: 1.5em;">Back to Home</a>
        <div class="container">
            <div class="products-container">
                <div class="search-bar-container">
                    <input type="text" id="search" class="search-bar" placeholder="Search products...">
                    <i class="fa fas fa-search search-icon"></i>
                </div>
            						<input type="hidden" name="LastName" class = "form-control"value = "<?= $lastname ?>">
            						<input type="hidden" name="FirstName" class = "form-control"value = "<?= $firstname ?>">
            						<input type="hidden" name="contact" class = "form-control"value = "<?= $contact ?>">
            						<input type="hidden" name="email" class = "form-control"value = "<?= $email ?>">
            						<input type="hidden" name="hc" class = "form-control"value = "<?= $hc ?>">
            						<input type="hidden" name="date" class = "form-control"value = "<?= $date ?>">
                  <textarea name="message" hidden id="" cols="30" rows="10" class="form-control" placeholder="Message" ><?= esc($message) ?></textarea>
            
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
                            <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                            
                                <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                                <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                <h3><a><?= $item['prod_name'] ?></a></h3>
                                <?php if($item['prod_lprice'] == 0.00):?> 
                                    <p class="price">
                                        <span >₱ <?= $item['prod_mprice'] ?> </span>
                                    </p>
                                <?php else:?>
                                    <p class="price">
                                        <span class="size-select">Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach($pasta as $item): ?>
                            <div class="box" data-category="pasta">
                            <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                            <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                                <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                <h3><a><?= $item['prod_name'] ?></a></h3>
                                <?php if($item['prod_lprice'] == 0.00):?> 
                                    <p class="price">
                                        <span> ₱ <?= $item['prod_mprice'] ?> </span>
                                    </p>
                                <?php else:?>
                                    <p class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach($meal as $item): ?>
                            <div class="box" data-category="meal">
                            <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                            <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                                <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                <h3><a><?= $item['prod_name'] ?></a></h3>
                                <?php if($item['prod_lprice'] == 0.00):?> 
                                    <p class="price">
                                        <span> ₱ <?= $item['prod_mprice'] ?> </span>
                                    </p>
                                <?php else:?>
                                    <p class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                    <?php foreach($salad as $item): ?>

                        <div class="box" data-category="salad">
                        <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($sand as $item): ?>
                        <div class="box" data-category="sand">
                        <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($soup as $item): ?>
                        <div class="box" data-category="soup">
                        <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($hot as $item): ?>
                        
                        <div class="box" data-category="hot">
                             <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
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
                        <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price size-select">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
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
                        <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
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
                        <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
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
                        <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
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
                        <input type="hidden" value="<?= session()->get('UserID')?>" class="UserID">
                            <input type="hidden" value="<?= $HCustomer ?>" class="HCustomer">
                            <input type="hidden" value="<?= $EventTitle ?>" class="EventTitle">
                              <input type="hidden" value="<?= $EventDate ?>" class="EventDate">
                              <input type="hidden" value="<?= $UpdatedContactNo ?>" class="updatedContactNo">
                        <input type="hidden" class="prodID" value="<?= $item['prod_id']?>">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
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
                    <h2>Reservation Orders</h2>
                    <table class="order-list">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th> Product Total Price</th>
                                <th> Action</th>
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
                        <button id="pay-button" disabled>Pay</button><br><br>
                        <div id="change-output"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
const orderButtons = document.querySelectorAll('.add-to-order');
const orderList = document.querySelector('.order-list tbody');
const totalPriceElement = document.getElementById('total-price');
const totalQuantityElement = document.getElementById('total-quantity');
const payButtonx = document.getElementById('pay-button');

let total = 0;
let quantityTotal = 0;

function updatePayButton()
{
    if (orderList.querySelectorAll('tr').length === 0) {
        payButton.disabled = true; 
    } else {
        payButton.disabled = false;
    }
}
function updateTotalPrice() {
    totalPriceElement.textContent = `₱ ${total.toFixed(2)}`;
}

function resetPaymentFields() {
    paymentInput.value = '';
    changeOutput.textContent = '';
}

orderButtons.forEach(button => {
    button.addEventListener('click', () => {
        const product = button.parentElement;
        const productName = product.querySelector('h3').innerText;
        const productId = product.querySelector('.prodID').value;

        let productPrice = parseFloat(button.dataset.price);
        let productSize = '';

        if (product.querySelector('.size-select')) {
            const selectedOption = product.querySelector('.size-select option:checked');
            productSize = selectedOption ? selectedOption.textContent : '';
            productPrice = parseFloat(selectedOption.value);
        }

        let existingRow = null;

        orderList.querySelectorAll('tr').forEach(row => {
            const rowProductName = row.cells[0].textContent;
            let rowProductSize = '';

            if (row.querySelector('.size-cell')) {
                rowProductSize = row.querySelector('.size-cell').textContent;
            }
            if (rowProductName === productName && rowProductSize === productSize) {
                existingRow = row;
                return;
            }
        });

        if (existingRow) {
            const quantityElement = existingRow.querySelector('.quantity');
            const quantity = parseInt(quantityElement.textContent) + 1;
            quantityElement.textContent = quantity;

            const totalPriceCell = existingRow.querySelector('.total-price-cell');
            const existingTotalPrice = parseFloat(totalPriceCell.textContent.replace('₱ ', ''));
            const newTotalPrice = existingTotalPrice + productPrice; 
            totalPriceCell.textContent = `₱ ${newTotalPrice.toFixed(2)}`;

            total += productPrice;
            quantityTotal += 1;
            totalQuantityElement.textContent = quantityTotal; 
        } else {
            total += productPrice; 
            quantityTotal += 1;
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${productName}</td>
                <td hidden>${productId}</td>
                <td class="size-cell">${productSize}</td>
                <td class="quantity-cell">
                    <button class="decrease">-</button>
                    <span class="quantity">1</span>
                    <button class="increase">+</button>
                </td>
                <td class="price-cell">₱ ${productPrice.toFixed(2)}</td>
                <td class="total-price-cell">₱ ${productPrice.toFixed(2)}</td>
                <td><button class="remove">Remove</button></td>
            `;
            orderList.appendChild(row);
            totalQuantityElement.textContent = quantityTotal; 
        }
        updatePayButton();
        updateTotalPrice();
    });
});

orderList.addEventListener('click', (event) => {
    const target = event.target;
    if (target.classList.contains('increase')) {
        const row = target.closest('tr');
        
        const quantityElement = row.querySelector('.quantity');
        const quantity = parseInt(quantityElement.textContent);
        const price = parseFloat(row.querySelector('.price-cell').textContent.replace('₱ ', ''));
        
        quantityElement.textContent = quantity + 1;
        const totalPriceCell = row.querySelector('.total-price-cell');
        const newTotalPrice = (quantity + 1) * price;
        totalPriceCell.textContent = `₱ ${newTotalPrice.toFixed(2)}`;

        total += price;
        quantityTotal += 1; 
        totalQuantityElement.textContent = quantityTotal; 
        updateTotalPrice();
    } else if (target.classList.contains('decrease')) {
        const row = target.closest('tr');
        const quantityElement = row.querySelector('.quantity');
        const quantity = parseInt(quantityElement.textContent);
        if (quantity > 1) { 
            const price = parseFloat(row.querySelector('.price-cell').textContent.replace('₱ ', ''));
            quantityElement.textContent = quantity - 1;
            const totalPriceCell = row.querySelector('.total-price-cell');
            const newTotalPrice = (quantity - 1) * price;
            totalPriceCell.textContent = `₱ ${newTotalPrice.toFixed(2)}`;

            total -= price;
            quantityTotal -= 1; 
            totalQuantityElement.textContent = quantityTotal; 
            updateTotalPrice();
        }
    } else if (target.classList.contains('remove')) {
        const row = target.closest('tr');
        const price = parseFloat(row.querySelector('.price-cell').textContent.replace('₱ ', ''));
        const quantity = parseInt(row.querySelector('.quantity').textContent);
        total -= price * quantity;
        quantityTotal -= quantity;
        row.remove();
        totalQuantityElement.textContent = quantityTotal;
        updateTotalPrice();
        updatePayButton();
        resetPaymentFields(); 
    }
});
    </script>
    <script>
    const payButton = document.getElementById('pay-button');
const paymentInput = document.getElementById('payment-input');

payButton.addEventListener('click', () => {
    const payment = parseFloat(paymentInput.value);
    const change = payment - total;
    // Get values from hidden inputs
    const lastName = document.querySelector('input[name="LastName"]').value;
        const firstName = document.querySelector('input[name="FirstName"]').value;
        const contact = document.querySelector('input[name="contact"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const hc = document.querySelector('input[name="hc"]').value;
        const date = document.querySelector('input[name="date"]').value;
        const message = document.querySelector('textarea[name="message"]').value;

        
    const paymentData = [];
    
    // Loop through each product in the order list
    orderList.querySelectorAll('tr').forEach(row => 
    {     const productname = row.cells[0].textContent; // Get the product Name
        const productId = row.cells[1].textContent; // Get the product ID
        const totalPrice = row.querySelector('.total-price-cell').textContent.replace('₱ ', ''); // Get the total price
        const totalQuantity = row.querySelector('.quantity').textContent; // Get the total quantity
                
        
      

        const productData = {
            productname: productname,
            productId: productId,    
            totalPrice: totalPrice,
            totalQuantity: totalQuantity,
           
        };

        // Push payment data for each product into the array
        paymentData.push(productData);

        // Log the data being pushed
        console.log(productData);
    });

// Store values in localStorage or pass directly to the new form
localStorage.setItem('lastName', lastName);
localStorage.setItem('firstName', firstName);
localStorage.setItem('contact', contact);
localStorage.setItem('email', email);
localStorage.setItem('hc', hc);
localStorage.setItem('date', date);
localStorage.setItem('message', message);


    localStorage.setItem('paymentData', JSON.stringify(paymentData));

    // Redirect to the new form page
    window.location.href ='/getData';

});

    </script>
    <script>
        const categoryTabs = document.querySelectorAll('.category-tab');
        const productBoxes = document.querySelectorAll('.products .box');

        categoryTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const category = tab.dataset.category;
                filterProducts(category);
            });
        });

        function filterProducts(category) {
            productBoxes.forEach(box => {
                const productCategory = box.dataset.category;

                if (category === 'all' || productCategory === category) {
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            });
        }
    </script>
    <script>
        const searchInput = document.getElementById('search');
        const noProductMessage = document.querySelector('.no-product-message');

        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.trim().toLowerCase();
            let anyProductFound = false;

            productBoxes.forEach(box => {
                const productName = box.querySelector('h3').innerText.toLowerCase();

                if (productName.includes(searchTerm)) {
                    box.style.display = 'block';
                    anyProductFound = true;
                } else {
                    box.style.display = 'none';
                }
            });

            if (anyProductFound) {
                noProductMessage.style.display = 'none';
            } else {
                noProductMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
