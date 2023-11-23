<x-layout>
    <section class="payment-status-section failure">
        <div class="payment-status-card">
            <div class="payment-status-card-content failure">
                <div class="payment-status-card-content-icon failure">
                    <i class="fa-solid fa-x fa-beat"></i>
                </div>
                <div class="payment-status-card-content-title failure">
                    <h1>Payment Failed</h1>
                </div>
                <div class="payment-status-card-content-text failure">
                    <p>Your transaction has failed due to some errors. Please try again later.</p>
                </div>
                <div class="payment-status-card-content-text-reasons">
                    <p>Possible reasons for failure:</p>
                    <ul>
                        <li>Cancelled by you.</li>
                        <li>Insufficient fund in your account.</li>
                        <li>Error from the wallet or bank side</li>
                        <li>Technical erros in the server or network failure.</li>
                    </ul>
                </div>
                <div class="payment-status-card-content-btn failure">
                    <button onclick="window.location='/#plans'">Browse Plans</button>
                </div>
            </div>
        </div>
    </section>
</x-layout>
