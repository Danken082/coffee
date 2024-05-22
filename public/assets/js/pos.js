/* ADD ORDER */
const orderButtons = document.querySelectorAll('.add-to-order');
const orderList = document.querySelector('.order-list tbody');
const totalPrice = document.getElementById('total-price');
const totalQuantity = document.getElementById('total-quantity');
const enterPayment = document.getElementById('payment-input');
const changeOutputs = document.getElementById('change-output');
let total = 0;
let quantityTotal = 0;

function resetPaymentFields() {
    enterPayment.value = '';
    changeOutputs.textContent = '';
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
    totalPrice.textContent = `₱ ${total.toFixed(2)}`; 
    totalQuantity.textContent = quantityTotal; 
} else {
    let productExists = false;
    orderList.querySelectorAll('tr').forEach(row => {
        const rowProductName = row.cells[0].textContent;
        if (rowProductName === productName) {
            productExists = true;
            return;
        }
    });

    if (!productExists || productSize) {
        total += productPrice; 
        quantityTotal += 1;
        const row = document.createElement('tr');
        row.innerHTML = `
            <td >${productName}</td>
            <td hidden>${productId}</td>
            <td class="size-cell">${productSize}</td>
        
            <td class="quantity-cell">
                <button class="decrease">-</button>
                <span class="quantity">1</span>
                <button class="increase">+</button>
            </td>
            <td class="price-cell">₱ ${productPrice.toFixed(2)}</td>
            <td class="total-price-cell" id="total-price-cell" hidden>₱ ${productPrice.toFixed(2)}</td>
            <td><button class="remove">Remove</button></td>
        `;
        orderList.appendChild(row);
        totalPrice.textContent = `₱ ${total.toFixed(2)}`;
        totalQuantity.textContent = quantityTotal; 
    }
}
    });
});

orderList.addEventListener('click', (event) => {
    const target = event.target;
    if (target.classList.contains('increase')) {
        const getPrice = document.getElementById('total-price-cell');
        const quantityElement = target.parentNode.querySelector('.quantity');
        const quantity = parseInt(quantityElement.textContent);
        const price = parseFloat(target.parentNode.nextElementSibling.textContent.replace('₱ ', ''));
    
        quantityElement.textContent = quantity + 1;
        total += price;
        quantityTotal += 1; 
        getPrice.textContent = `₱ ${total.toFixed(2)}`;
        totalPrice.textContent = `₱ ${total.toFixed(2)}`;
        totalQuantity.textContent = quantityTotal; 
    } else if (target.classList.contains('decrease')) {
        const getPrice = document.getElementById('total-price-cell');
        const quantityElement = target.parentNode.querySelector('.quantity');
        const quantity = parseInt(quantityElement.textContent);
        if (quantity > 1) { 
            const price = parseFloat(target.parentNode.nextElementSibling.textContent.replace('₱ ', ''));
            quantityElement.textContent = quantity - 1;
            total -= price;
            quantityTotal -= 1; 
            getPrice.textContent = `₱ ${total.toFixed(2)}`;
            totalPrice.textContent = `₱ ${total.toFixed(2)}`;
            totalQuantity.textContent = quantityTotal; 
        }
    } else if (target.classList.contains('remove')) {
        const row = target.closest('tr');
        const price = parseFloat(row.querySelector('.price-cell').textContent.replace('₱ ', ''));
        const quantity = parseInt(row.querySelector('.quantity').textContent);
        total -= price * quantity;
        quantityTotal -= quantity;
        row.remove();
        totalPrice.textContent = `₱ ${total.toFixed(2)}`;
        totalQuantity.textContent = quantityTotal;
        resetPaymentFields(); // Reset payment fields when an item is removed
    }
});

/* PAYMENT */
const payButton = document.getElementById('pay-button');
const saveTransactionButton = document.getElementById('save-transaction-button');
const paymentInput = document.getElementById('payment-input');
const changeOutput = document.getElementById('change-output');
const totalPrices = document.getElementById('total-price');
const totalQuantitys = document.getElementById('total-quantity');
const orderLists = document.getElementById('order-list');

let totals = parseFloat(totalPrices.textContent.replace('₱ ', ''));

payButton.addEventListener('click', () => {
    const payment = parseFloat(paymentInput.value);
    const change = payment - total;

    if (change >= 0) {
        changeOutput.textContent = `Change: ₱ ${change.toFixed(2)}`;
    } else {
        alert('Insufficient payment.');
    }
});

saveTransactionButton.addEventListener('click', () => {
    const payment = parseFloat(paymentInput.value);
    totals = parseFloat(totalPrices.textContent.replace('₱ ', ''));
    const change = payment - total;

    if (isNaN(payment) || payment <= 0) {
        alert('Please enter a valid payment amount.');
        return;
    }

    if (change < 0) {
        alert('Payment is insufficient.');
        return;
    }

    const paymentData = [];
    orderList.querySelectorAll('tbody tr').forEach(row => {
        const productId = row.cells[1].textContent;
        const totalPrice =  row.querySelector('.total-price-cell').textContent.replace('₱ ', '');
        const totalquantity = row.querySelector('.quantity').textContent;
        const amountPaid = payment;
        const productChange = change.toFixed(2);

        paymentData.push({
            productId: productId,
            totalPrice: totalPrice,
            totalquantity: totalquantity,
            amountPaid: amountPaid,
            change: productChange
        });
    });

    fetch('/payment/save', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(paymentData),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to save payments.');
        }
        return response.json();
    })
    .then(data => {
        console.log('Payments saved successfully:', data);
        orderLists.querySelector('tbody').innerHTML = '';
        paymentInput.value = '';
        changeOutput.textContent = '';
        totals = 0;
        totalPrices.textContent = '₱ 0.00';
        totalQuantitys.textContent = '0';
        alert('Transaction saved successfully.');
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving payments.');
    });
});


/* CATEGORY */    
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


/* SEARCH PRODUCT*/
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