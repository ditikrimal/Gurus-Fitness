<x-layout>
    <h1 class="subscription-title">Checkout</h1>
    <section class="checkout-section">
        <div class="plan-details">
            <h2 class="plan-details-title">{{ $passedPlan['plan_title'] }}</h2>
            <p class="plan-details-date">

                <span class="plan-details-date-title">Start Date:</span>
                <span class="plan-details-date-value">
                    <strong id="start-date">
                        {{ date('Y-m-d') }}
                    </strong>
                </span>
                <span class="plan-details-date-title">End Date:</span>
                <span class="plan-details-date-value">
                    <strong id="end-date">
                        2024/12/12

                    </strong>

                </span>


            </p>

            <hr>
            <h3 class="payment-options-title">Choose your payment option</h3>

            <div class="payment-options">

                <div class="payment-options-inputs">
                    <input data-payment-method="esewa" id="esewa" name="payment" type="radio">
                    <label for="esewa"><img alt="" class="payment-option-img"
                            src="{{ asset('images/PaymentLogos/Esewa.png') }}"></label>
                </div>
                <div class="payment-options-inputs">
                    <input data-payment-method="khalti" id="khalti" name="payment" type="radio">
                    <label for="ime-pay"><img alt="" class="payment-option-img"
                            src="{{ asset('images/PaymentLogos/Khalti.png') }}"></label>
                </div>
                <div class="payment-options-inputs">
                    <input data-payment-method="ime-pay" id="ime-pay" name="payment" type="radio">
                    <label for="khalti"><img alt="" class="payment-option-img"
                            src="{{ asset('images/PaymentLogos/Ime-Pay.png') }}"></label>
                </div>

            </div>
        </div>
        <div class="checkout-details">
            <div class="checkout-details-content">
                <h2 class="checkout-details-title">Order Summary</h2>
                <hr>
                <div class="order-pricing">
                    <div class="sub-pricing sub">
                        <p>Subscription Price</p>
                        <strong id="subscription-price">Rs. {{ $passedPlan['plan_price'] }}</strong>
                    </div>
                    <div class="sub-pricing tax">
                        <p>Tax</p>
                        <strong>Rs. 0</strong>
                    </div>
                    <div class="sub-pricing total">
                        <p>Discount & offers</p>
                        <strong> {{ $passedPlan['discount'] }}%</strong>
                    </div>
                    <div class="sub-pricing payment-method">
                        <p>Payment method</p>
                        <strong id="selected-payment-method" style="text-transform: uppercase">Please Select </strong>

                    </div>
                    <div class="sub-pricing add-months">
                        <span class="add-months-title">Add Months:</span>
                        <div style="display:flex; gap:0.5rem; align-items:center;">
                            <button class="add-month-btn" id="remove-subscription-month-btn">-</button>

                            <span class="add-months-value">
                                <strong id="subscription-month">1</strong>
                            </span> <button class="add-month-btn" id="add-subscription-month-btn">+</button>

                        </div>
                    </div>
                </div>
                <div class="payable-amount">

                    <p>Total Paying Amount</p>
                    <strong>Rs.
                        <span id="total-paying-amount"> {{ $passedPlan['total_price'] }}


                        </span>
                    </strong>
                </div>

            </div>
            <div class="checkout-btn">




                <form action="/user/esewa/payment" id="proceed-payment-form" onsubmit="return validatePaymentMethod()">
                    @csrf
                    @method('POST')
                    <input id="subscription-plan-month-input" name="subscription_month" type="hidden" value="1">


                    <input name="user_id" type="hidden" value=" {{ $passedPlan['user_id'] }}">
                    <input name="plan_id" type="hidden" value="{{ $passedPlan['plan_id'] }}">
                    <input name="payment_method" type="hidden" value="esewa">
                    <input id="plan-price" name="payment_amount" type="hidden"
                        value="{{ $passedPlan['total_price'] }}">
                    <button id="proceed-to-payment" name="" type="submit">Proceed to
                        Payment</button>
                </form>
            </div>

        </div>
    </section>
</x-layout>
