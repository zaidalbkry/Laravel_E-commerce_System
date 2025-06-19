@extends('frontend.layout')

@section('css-custom-files')
@endsection

@section('js-custom-files')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        displayCartItems();
        prepareOrderData();
        
        // عند تقديم النموذج، نقوم بتعبئة حقل البيانات أولاً ثم مسح السلة
        document.getElementById("order-form").addEventListener("submit", function() {
            prepareOrderData(); // تعبئة الحقل بالمحتويات الحالية للسلة
            clearCart();        // مسح السلة بعد نقل البيانات إلى الحقل المخفي
        });
    });

    function displayCartItems() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let cartContainer = document.getElementById("cart-items");
        let totalContainer = document.getElementById("cart-total-price");
        let total = 0;

        cartContainer.innerHTML = "";

        if (cart.length === 0) {
            cartContainer.innerHTML = "<p class='alert alert-warning w-100 text-center'>🛍 Empty Cart.</p>";
            totalContainer.innerText = "$0.00";
            return;
        }

        cart.forEach((product, index) => {
            total += parseFloat(product.price);
            let productCard = document.createElement("div");
            productCard.classList.add("col-lg-4", "col-md-6", "special-grid");

            productCard.innerHTML = `
                <div class="gallery-single fix">
                    <img src="${product.image}" class="img-fluid" alt="${product.name}" />
                    <div class="why-text">
                        <h4>${product.name}</h4>
                        <h5>$${product.price}</h5>
                        <button class="btn btn-outline-danger btn-sm mt-2" onclick="removeFromCart(${index})">❌ Remove</button>
                    </div>
                </div>
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

    // clearCart() لمسح الـ localStorage وتحديث العرض
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

<div class="container my-5">
    <h2 class="mb-4 text-center">🛒 Cart</h2>

    <div id="cart-items" class="row">
        <!-- Cart items will be rendered via JavaScript -->
    </div>

    <div class="d-flex justify-content-center mt-4">
        <button onclick="clearCart()" class="btn btn-danger mx-2">🗑 Clear Cart</button>
    </div>
    
    <div class="text-center mt-4">
        <h2>Total: <span id="cart-total-price">$0.00</span></h2>
    </div>
    
    <!-- Order Completion Section -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">Complete Your Order</h2>
        
        <form id="order-form" action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control"
                    placeholder="Enter your phone number" required />
            </div>

            <!-- Hidden field to send cart data with the order -->
            <input type="hidden" name="cart_items" id="cart_items">

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success mx-2">Confirm Order</button>
            </div>
        </form>
    </div>
</div>

@endsection
