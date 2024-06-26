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
    var grandTotal = total + 50; // Adding ₱50 delivery charge
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
    checkPaymentMethod();
});

document.querySelectorAll('input[name="newquantity"]').forEach(function (input) {
    input.addEventListener("input", function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});

document.querySelector('.paymentMethodSelector').addEventListener('change', checkPaymentMethod);