<x-layout>
    <section class="payment-status-section success">
        <div class="payment-status-card">
            <div class="payment-status-card-content">
                <div class="payment-status-card-content-icon success">
                    <i class="fa-solid fa-check fa-beat"></i>
                </div>
                <div class="payment-status-card-content-title">
                    <h1>Payment Successful</h1>
                </div>
                <div class="payment-status-card-content-text">
                    <p>Thank you for your payment. Your payment has been successfully processed.</p>
                </div>
                <div class="payment-status-card-content-text-reasons">
                    <p>Payment Details:</p>
                    <ul>
                        <li>Payment ID: {{ $payment_details->payment_id }}</li>
                        <li>Payment Method: {{ $payment_details->payment_method }}</li>
                        <li>Payment Amount: {{ $payment_details->payment_amount }}</li>
                        <li>Payment Date: @php
                            echo date('Y-m-d');
                        @endphp</li>
                    </ul>
                </div>
                <div class="payment-status-card-content-btn">

                    <button onclick="window.location='/user/my-subscriptions'">Go to your subscription page</button>
                </div>
            </div>
        </div>
    </section>
</x-layout>
