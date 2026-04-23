@extends('frontend.layout')

@section('css-custom-files')
@endsection
@section('js-custom-files')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        displayCartItems();
        prepareOrderData();

        document.getElementById("order-form").addEventListener("submit", function() {
            prepareOrderData();
            clearCart();
        });
    });

    function addToCart(id, name, image, price) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        let existing = cart.find(item => item.id === id);
        if (!existing) {
            cart.push({ id, name, image, price });
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            alert("Product added to cart ✅");
        } else {
            alert("Product already in cart ⚠️");
        }
    }

    function displayCartItems() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let cartContainer = document.getElementById("cart-items");
        let totalContainer = document.getElementById("cart-total-price");
        let total = 0;

        cartContainer.innerHTML = "";

        if (cart.length === 0) {
            cartContainer.innerHTML = "<p class='rounded-xl bg-yellow-50 px-4 py-3 text-center text-yellow-800'>Empty Cart.</p>";
            totalContainer.innerText = "$0.00";
            return;
        }

        cart.forEach((product, index) => {
            total += parseFloat(product.price);
            let productCard = document.createElement("div");
            productCard.classList.add("fb-card");

            productCard.innerHTML = `
                <img src="${product.image}" class="h-52 w-full rounded-xl object-cover" alt="${product.name}" />
                <h4 class="mt-4 text-lg font-bold">${product.name}</h4>
                <h5 class="text-mint-700">$${product.price}</h5>
                <button class="mt-3 w-full rounded-xl bg-red-600 px-4 py-2 font-semibold text-white hover:bg-red-700" onclick="removeFromCart(${index})">Remove</button>
            `;
            cartContainer.appendChild(productCard);
        });

        totalContainer.innerText = `$${total.toFixed(2)}`;
    }

    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCartItems();
        updateCartCount();
    }

    function clearCart() {
        localStorage.removeItem('cart');
        displayCartItems();
        updateCartCount();
    }

    function updateCartCount() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let cartCountElement = document.getElementById("cart-count");
        if (cartCountElement) {
            cartCountElement.innerText = cart.length;
        }
    }

    function prepareOrderData() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        document.getElementById("cart_items").value = JSON.stringify(cart);
    }
</script>
@endsection


@section('content')
<div class="mx-auto max-w-5xl">
    <h2 class="mb-4 text-center text-2xl font-bold text-mint-900">Cart</h2>

    <div id="cart-items" class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Items loaded with JS -->
    </div>

    <div class="mt-4 flex justify-center">
        <button onclick="clearCart()" class="fb-btn-secondary">Clear Cart</button>
    </div>

    <div class="mt-4 text-center">
        <h2 class="text-xl font-bold">Total: <span id="cart-total-price">$0.00</span></h2>
    </div>

    <div class="fb-card mx-auto mt-8 max-w-xl">
        <h2 class="mb-4 text-center text-xl font-bold text-mint-900">Complete Your Order</h2>
        
        <form id="order-form" action="{{ route('order.store') }}" method="POST">
            @csrf
            <div>
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="mt-1 w-full rounded-xl border-mint-200"
                    placeholder="Enter your phone number" required />
            </div>

            <input type="hidden" name="cart_items" id="cart_items">

            <div class="mt-4 flex justify-center">
                <button type="submit" class="fb-btn">Confirm Order</button>
            </div>
        </form>
    </div>
</div>
@endsection
