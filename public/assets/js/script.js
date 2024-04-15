let total = 0;

function addToOrder(itemName, price) {
    const orderList = document.getElementById('order-list');
    const totalSpan = document.getElementById('total');

    const listItem = document.createElement('li');
    listItem.textContent = `${itemName} - $${price.toFixed(2)}`;
    orderList.appendChild(listItem);

    total += price;
    totalSpan.textContent = total.toFixed(2);
}

function checkout() {
    // Here you can implement further logic for checkout, such as sending the order to the server
    alert(`Total amount: $${total.toFixed(2)}. Order placed successfully!`);
    resetOrder();
}

function resetOrder() {
    const orderList = document.getElementById('order-list');
    const totalSpan = document.getElementById('total');

    orderList.innerHTML = '';
    total = 0;
    totalSpan.textContent = total.toFixed(2);
}