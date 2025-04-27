@extends('frontend.master')

@section('content')

<!-- Breadcrumb Start -->
<div class="sticky-header-next-sec ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6">
                        <h2 class="ec-breadcrumb-title">Cart</h2>
                    </div>
                    <div class="col-md-6">
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="ec-breadcrumb-item active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Page Start -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <!-- Cart Items -->
            <div class="ec-cart-leftside col-lg-8 col-md-12">
                <div class="ec-cart-content">
                    <div class="table-content cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th style="text-align: center;">Qty</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $carts = allcart();
                                    $cartTotal = 0;
                                @endphp

                                @forelse($carts as $item)
                                    @php
                                        $price = $item->product->sale_price ?? 0;
                                        $qty = $item->amount ?? 1;
                                        $itemTotal = $price * $qty;
                                        $available = available_quantity($item->product_id);
                                        $cartTotal += $itemTotal;
                                    @endphp
                                    <tr>
                                        <td>
                                            <a href="#"><img src="{{ asset('uploads/product/' . $item->product->photo) }}" width="60">
                                                <span>{{ $item->product->product_name }}</span></a>
                                            <br>
                                            <span>Status:
                                                @if($qty > $available)
                                                    <span class="text-danger">Stock Out</span>
                                                @else
                                                    <span class="text-success">Available - {{ $available }}</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td>{{ $item->product_size }}</td>
                                        <td>{{ $item->product_color }}</td>
                                        <td>৳{{ round($price) }}</td>
                                        <td style="text-align: center;">
                                            <div class="quantity-wrapper d-flex align-items-center justify-content-center">
                                                <button type="button" class="qty-btn btn-sm minus">−</button>
                                                <input type="number" class="quantity-input form-control text-center mx-1" min="1" value="{{ $qty }}" data-id="{{ $item->id }}" />
                                                <button type="button" class="qty-btn btn-sm plus">+</button>
                                            </div>
                                        </td>
                                        <td class="ec-cart-pro-subtotal">৳{{ round($itemTotal) }}</td>
                                        <td>
                                            <a href="{{ route('cart.remove', $item->id) }}" onclick="return confirm('Are you sure?')">
                                                <i class="ecicon eci-trash-o text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-danger">🛒 আপনার কার্ট খালি।</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if($carts->isNotEmpty())
            <!-- Checkout -->
            <div class="ec-cart-rightside col-lg-4 col-md-12">
                <form action="{{ route('checkout', $item->id ?? 0) }}" method="POST">
                    @csrf
                    <div class="ec-sidebar-wrap">
                        <div class="ec-sidebar-block">
                            <h6 class="ec-ship-title">নিচের তথ্য দিন ও এলাকা সিলেক্ট করুন</h6>
                            <input type="text" class="form-control mb-2 autosave" name="customer_name" placeholder="আপনার নাম" value="{{ old('customer_name', session('customer_name')) }}">
                            <input type="text" class="form-control mb-2 autosave" name="customer_address" placeholder="আপনার ঠিকানা" value="{{ old('customer_address', session('customer_address')) }}">
                            <input type="text" class="form-control mb-2 autosave" name="customer_phone" placeholder="মোবাইল নাম্বার" value="{{ old('customer_phone', session('customer_phone')) }}">
                            <select id="area" name="shipping_id" class="form-control border mb-2 autosave">
                                @foreach ($shippingMethod as $method)
                                    <option value="{{ $method->id }}" {{ $method->id == old('shipping_id', session('selected_area')) ? 'selected' : '' }}>
                                        {{ $method->type }}
                                    </option>
                                @endforeach
                            </select>
                            <textarea class="form-control mb-3 autosave" name="customer_note" rows="4" placeholder="অর্ডার নোট">{{ old('customer_note', session('customer_note')) }}</textarea>

                            <div class="ec-cart-summary">
                                <div><span>Sub-Total</span><span id="subtotal">৳{{ session('subtotal', round($cartTotal) - session('discount_total', 0)) }}</span></div>
                                <div><span>Delivery Charges</span><span id="delivery-charge">৳{{ session('total_shipping_cost', 0) }}</span></div>
                                <div><span>Coupon Discount</span><span><a class="ec-cart-coupan">Apply Coupon</a></span></div>
                                <div class="ec-cart-coupan-content">
                                    <input class="form-control mb-2" name="coupon_name" placeholder="Enter Coupon" value="{{ session('coupon_name') }}">
                                    <button class="btn btn-primary btn-sm" type="submit">Apply</button>
                                </div>
                                <div><span>Coupon ({{ session('coupon_name') ?? 'None' }})</span><span id="coupon-discount">৳{{ session('discount_total', 0) }}</span></div>
                                <div class="ec-cart-summary-total"><span>Total Amount</span><span id="total">৳{{ session('total_price', round($cartTotal + session('total_shipping_cost', 0))) }}</span></div>
                            </div>

                            @php
                                $hasStockOut = $carts->contains(fn($item) => ($item->amount ?? 0) > available_quantity($item->product_id));
                            @endphp

                            @if($hasStockOut)
                                <div class="alert alert-danger mt-2">⚠️ স্টকে নেই এমন পণ্য রিমুভ করুন।</div>
                            @else
                                <button type="submit" class="btn btn-success mt-3 w-100" style="font-size: 18px;">✅ অর্ডার কনফার্ম করুন</button>
                            @endif
                        </div>
                    </div>
                </form>

            </div>
            @endif
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Update Cart Function (AJAX)
        const updateCart = (id, quantity) => {
            fetch(`/update-cart-ajax`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id, quantity })
            })
            .then(res => res.json())
            .then(data => {
                // Update subtotal, delivery charge, and total
                document.getElementById('subtotal').innerText = '৳' + data.subtotal.toFixed(2);
                document.getElementById('delivery-charge').innerText = '৳' + data.delivery_charge.toFixed(2);
                document.getElementById('total').innerText = '৳' + (data.subtotal + data.delivery_charge).toFixed(2);
                // Update item total in the cart
                document.querySelector(`input[data-id="${id}"]`).closest('tr').querySelector('.ec-cart-pro-subtotal').innerText = '৳' + data.item_total.toFixed(2);
                showToast('✅ পরিমাণ আপডেট হয়েছে');
            })
            .catch(() => showToast('❌ কার্ট আপডেট করতে সমস্যা হয়েছে', 'error'));
        };

        // Quantity Update on Plus/Minus Button Click
        document.querySelectorAll('.qty-btn.plus, .qty-btn.minus').forEach(btn => {
            btn.addEventListener('click', function () {
                const input = this.parentElement.querySelector('.quantity-input');
                let qty = parseInt(input.value) + (this.classList.contains('plus') ? 1 : -1);
                qty = Math.max(qty, 1);
                input.value = qty;
                updateCart(input.dataset.id, qty);
            });
        });

        // Quantity Update on Input Change
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function () {
                let qty = parseInt(this.value);
                if (isNaN(qty) || qty < 1) qty = 1;
                this.value = qty;
                updateCart(this.dataset.id, qty);
            });
        });

        // Shipping Area Selection
        const areaSelect = document.getElementById('area');
        if (areaSelect) {
            areaSelect.addEventListener('change', () => {
                fetch(`/get-shipping-charge/${areaSelect.value}`)
                    .then(res => res.json())
                    .then(data => {
                        const charge = parseFloat(data.charge);
                        let subtotal = parseFloat(document.getElementById('subtotal').innerText.replace(/[৳,]/g, ''));
                        document.getElementById('delivery-charge').innerText = '৳' + charge.toFixed(2);
                        document.getElementById('total').innerText = '৳' + (subtotal + charge).toFixed(2);
                    });
            });
            areaSelect.dispatchEvent(new Event('change')); // Initialize on load
        }

        // Autosave Functionality for Checkout Form
        const autosaveFields = document.querySelectorAll('.autosave');

        // Listen to input/change events and trigger autosave
        autosaveFields.forEach(field => {
            field.addEventListener('change', autosaveCheckout);
            field.addEventListener('input', debounce(autosaveCheckout, 1000));  // debounce to limit the number of requests
        });

        function autosaveCheckout() {
            const data = {
                customer_name: document.querySelector('[name="customer_name"]').value,
                customer_phone: document.querySelector('[name="customer_phone"]').value,
                customer_address: document.querySelector('[name="customer_address"]').value,
                shipping_id: document.querySelector('[name="shipping_id"]').value,
                customer_note: document.querySelector('[name="customer_note"]').value,
            };

            // Send autosave request to the server
            fetch("{{ route('autosave.checkout') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast('✅ ইনফরমেশন সেভ হয়েছে');
                } else {
                    showToast('❌ সেভ হয়নি', 'error');
                }
            })
            .catch(err => showToast('❌ Autosave Error:', 'error'));
        }

        // Debounce function to limit the number of autosave requests
        function debounce(func, delay) {
            let timeout;
            return function () {
                clearTimeout(timeout);
                timeout = setTimeout(func, delay);
            };
        }

        // Show toast notification
        function showToast(msg, type = 'success') {
            const toast = document.createElement('div');
            toast.innerText = msg;
            toast.style = `position: fixed; bottom: 20px; right: 20px; padding: 10px 20px; border-radius: 5px; background: ${type === 'error' ? '#e74c3c' : '#2ecc71'}; color: white; z-index: 9999; opacity: 0; transition: opacity 0.5s;`;
            document.body.appendChild(toast);
            setTimeout(() => toast.style.opacity = 1, 100);
            setTimeout(() => {
                toast.style.opacity = 0;
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }
    });
</script>

@endsection
