@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="text-center mb-4">
                <i class="bi bi-credit-card me-2"></i>
                Checkout
            </h1>

            <!-- Step Indicator -->
            <div class="step-indicator mb-4">
                <div class="step active">
                    <i class="bi bi-1-circle"></i>
                </div>
                <div class="step">
                    <i class="bi bi-2-circle"></i>
                </div>
                <div class="step">
                    <i class="bi bi-3-circle"></i>
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                @csrf

                <!-- Step 1: Shipping Information -->
                <div class="checkout-step" id="step1">
                    <h3 class="mb-4">
                        <i class="bi bi-truck me-2"></i>
                        Shipping Information
                    </h3>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fullname" class="form-label fw-bold">
                                <i class="bi bi-person me-1"></i>
                                Full Name *
                            </label>
                            <input type="text" name="fullname" id="fullname" class="form-control"
                                   value="{{ old('fullname') }}" required>
                            @error('fullname')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label fw-bold">
                                <i class="bi bi-telephone me-1"></i>
                                Phone Number *
                            </label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                   value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">
                            <i class="bi bi-geo-alt me-1"></i>
                            Shipping Address *
                        </label>
                        <textarea name="address" id="address" class="form-control" rows="3"
                                  placeholder="Enter your complete shipping address" required>{{ old('address') }}</textarea>
                        @error('address')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-primary" onclick="nextStep(2)">
                            Next: Payment Method
                            <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Payment Method -->
                <div class="checkout-step d-none" id="step2">
                    <h3 class="mb-4">
                        <i class="bi bi-credit-card me-2"></i>
                        Payment Method
                    </h3>

                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-wallet me-1"></i>
                            Choose Payment Method *
                        </label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-check payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method"
                                           id="bank_transfer" value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="bank_transfer">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-bank me-2"></i>
                                            <div>
                                                <strong>Bank Transfer</strong>
                                                <br><small class="text-muted">Transfer to our bank account</small>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method"
                                           id="cod" value="cod" {{ old('payment_method') == 'cod' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cod">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-cash me-2"></i>
                                            <div>
                                                <strong>Cash on Delivery</strong>
                                                <br><small class="text-muted">Pay when you receive</small>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method"
                                           id="dana" value="dana" {{ old('payment_method') == 'dana' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dana">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-phone me-2"></i>
                                            <div>
                                                <strong>Dana</strong>
                                                <br><small class="text-muted">Digital wallet</small>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method"
                                           id="ovo" value="ovo" {{ old('payment_method') == 'ovo' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ovo">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-phone me-2"></i>
                                            <div>
                                                <strong>OVO</strong>
                                                <br><small class="text-muted">Digital wallet</small>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check payment-option">
                                    <input class="form-check-input" type="radio" name="payment_method"
                                           id="gopay" value="gopay" {{ old('payment_method') == 'gopay' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gopay">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-phone me-2"></i>
                                            <div>
                                                <strong>GoPay</strong>
                                                <br><small class="text-muted">Digital wallet</small>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @error('payment_method')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(1)">
                            <i class="bi bi-arrow-left me-1"></i>
                            Back
                        </button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(3)">
                            Next: Review Order
                            <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Order Review -->
                <div class="checkout-step d-none" id="step3">
                    <h3 class="mb-4">
                        <i class="bi bi-check-circle me-2"></i>
                        Review Your Order
                    </h3>

                    <!-- Order Summary -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="bi bi-receipt me-2"></i>
                                Order Summary
                            </h5>
                        </div>
                        <div class="card-body">
                            @php
                                $subtotal = 0;
                                $cart = session('cart', []);
                            @endphp
                            @foreach($cart as $item)
                                @php $itemTotal = $item['product']->price * $item['quantity']; $subtotal += $itemTotal; @endphp
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <strong>{{ $item['product']->name }}</strong>
                                        <br><small class="text-muted">{{ $item['quantity'] }} × $ {{ number_format($item['product']->price, 2) }}</small>
                                    </div>
                                    <span class="fw-bold">$ {{ number_format($itemTotal, 2) }}</span>
                                </div>
                            @endforeach

                            <hr class="my-3">
                            <div class="d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>$ {{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between fs-5 fw-bold">
                                <span>Total</span>
                                <span>$ {{ number_format($subtotal, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping & Payment Info -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">
                                        <i class="bi bi-truck me-2"></i>
                                        Shipping Details
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <p id="review-name" class="mb-1"><strong>Name:</strong> <span class="text-muted">Not provided</span></p>
                                    <p id="review-phone" class="mb-1"><strong>Phone:</strong> <span class="text-muted">Not provided</span></p>
                                    <p id="review-address" class="mb-0"><strong>Address:</strong> <span class="text-muted">Not provided</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">
                                        <i class="bi bi-credit-card me-2"></i>
                                        Payment Method
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <p id="review-payment" class="mb-0"><span class="text-muted">Not selected</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(2)">
                            <i class="bi bi-arrow-left me-1"></i>
                            Back
                        </button>
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="bi bi-check-circle me-2"></i>
                            Place Order
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function nextStep(step) {
    // Validate current step
    if (step === 2 && !validateStep1()) return;
    if (step === 3 && !validateStep2()) return;

    // Hide all steps
    document.getElementById('step1').classList.add('d-none');
    document.getElementById('step2').classList.add('d-none');
    document.getElementById('step3').classList.add('d-none');

    // Show target step
    document.getElementById('step' + step).classList.remove('d-none');

    // Update step indicators
    updateStepIndicators(step);
}

function prevStep(step) {
    // Hide all steps
    document.getElementById('step1').classList.add('d-none');
    document.getElementById('step2').classList.add('d-none');
    document.getElementById('step3').classList.add('d-none');

    // Show target step
    document.getElementById('step' + step).classList.remove('d-none');

    // Update step indicators
    updateStepIndicators(step);
}

function validateStep1() {
    const fullname = document.getElementById('fullname').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const address = document.getElementById('address').value.trim();

    if (!fullname || !phone || !address) {
        alert('Please fill in all required fields.');
        return false;
    }
    return true;
}

function validateStep2() {
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
    if (!paymentMethod) {
        alert('Please select a payment method.');
        return false;
    }
    return true;
}

function updateStepIndicators(activeStep) {
    const steps = document.querySelectorAll('.step');
    steps.forEach((step, index) => {
        step.classList.remove('active', 'completed');
        if (index + 1 === activeStep) {
            step.classList.add('active');
        } else if (index + 1 < activeStep) {
            step.classList.add('completed');
        }
    });
}

// Update review section in real-time
document.addEventListener('input', function(e) {
    if (e.target.name === 'fullname') {
        document.getElementById('review-name').innerHTML = '<strong>Name:</strong> ' + e.target.value;
    } else if (e.target.name === 'phone') {
        document.getElementById('review-phone').innerHTML = '<strong>Phone:</strong> ' + e.target.value;
    } else if (e.target.name === 'address') {
        document.getElementById('review-address').innerHTML = '<strong>Address:</strong> ' + e.target.value.replace(/\n/g, '<br>');
    }
});

document.addEventListener('change', function(e) {
    if (e.target.name === 'payment_method') {
        const paymentText = e.target.nextElementSibling.querySelector('strong').textContent;
        document.getElementById('review-payment').innerHTML = paymentText;
    }
});
</script>

<style>
.payment-option {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 1rem;
    transition: all 0.2s ease;
    cursor: pointer;
}

.payment-option:hover {
    border-color: var(--primary-color);
    background-color: rgba(13, 110, 253, 0.05);
}

.payment-option input:checked ~ label {
    color: var(--primary-color);
}

.payment-option input:checked {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}
</style>
@endsection
